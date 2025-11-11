<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ReniecService
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->apiKey  = (string) config('services.reniec.token', env('RENIEC_API_TOKEN'));
        $this->baseUrl = rtrim((string) config('services.reniec.url', env('RENIEC_API_URL')), '/');
        // Ejemplos válidos de baseUrl:
        // - https://api.decolecta.com  (entonces endpoint = /v1/reniec/dni)
        // - https://api.decolecta.com/v1/reniec (entonces endpoint = /dni)
    }

    public function getPersonByDNI($dni)
    {
        if (!preg_match('/^\d{8}$/', $dni)) {
            return null;
        }

        $cacheKey = "dni_{$dni}";
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // Decidir endpoint según si baseUrl ya contiene /v1/reniec
            $hasVersionedBase = preg_match('#/v1/reniec$#', $this->baseUrl) === 1;
            $endpoint = $hasVersionedBase ? '/dni' : '/v1/reniec/dni';
            $url = $this->baseUrl . $endpoint;

            Log::info("Making DNI request", [
                'url' => $url,
                'dni' => $dni,
                'apiKeyLength' => strlen($this->apiKey),
            ]);

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . trim($this->apiKey),
                'Content-Type'  => 'application/json',
            ])->get($url, ['numero' => $dni]);

            if ($response->successful()) {
                $data = $response->json();

                $mappedData = [
                    'nombres'        => $data['first_name'] ?? '',
                    'apellidos'      => trim(($data['first_last_name'] ?? '') . ' ' . ($data['second_last_name'] ?? '')),
                    'nombre_completo'=> $data['full_name'] ?? '',
                    'dni'            => $data['document_number'] ?? $dni,
                ];

                Log::info("DNI consultation successful", ['dni' => $dni, 'data' => $mappedData]);

                Cache::put($cacheKey, $mappedData, now()->addHours(24));
                return $mappedData;
            }

            Log::warning("DNI consultation failed: {$dni}", [
                'status'   => $response->status(),
                'response' => $response->body(),
                'url'      => $url,
            ]);
            return null;
        } catch (\Exception $e) {
            Log::error("Error consulting DNI: {$dni}", ['error' => $e->getMessage()]);
            return null;
        }
    }
}
