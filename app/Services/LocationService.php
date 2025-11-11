<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LocationService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.location.token', env('LOCATION_API_TOKEN'));
        $this->baseUrl = config('services.location.url', env('LOCATION_API_URL'));
        
        Log::info('LocationService initialized', [
            'baseUrl' => $this->baseUrl,
            'apiKeyLength' => strlen($this->apiKey)
        ]);
    }

    public function getCountries()
    {
        Log::info('Fetching countries');
        $result = $this->makeRequest('/countries');
        Log::info('Countries fetched', [
            'count' => is_array($result) ? count($result) : 'no results',
            'sample' => is_array($result) && !empty($result) ? array_slice($result, 0, 1) : null
        ]);
        return $result;
    }

    public function getStates($countryCode)
    {
        Log::info('Fetching states', ['countryCode' => $countryCode]);
        $result = $this->makeRequest("/countries/{$countryCode}/states");
        Log::info('States fetched', [
            'countryCode' => $countryCode,
            'count' => is_array($result) ? count($result) : 'no results',
            'sample' => is_array($result) && !empty($result) ? array_slice($result, 0, 1) : null
        ]);
        return $result;
    }

    public function getCities($countryCode, $stateCode = null)
    {
        Log::info('Fetching cities', [
            'countryCode' => $countryCode,
            'stateCode' => $stateCode
        ]);
        
        $endpoint = $stateCode 
            ? "/countries/{$countryCode}/states/{$stateCode}/cities"
            : "/countries/{$countryCode}/cities";
            
        $result = $this->makeRequest($endpoint);
        Log::info('Cities fetched', [
            'countryCode' => $countryCode,
            'stateCode' => $stateCode,
            'count' => is_array($result) ? count($result) : 'no results',
            'sample' => is_array($result) && !empty($result) ? array_slice($result, 0, 1) : null
        ]);
        return $result;
    }

    protected function makeRequest($endpoint)
    {
        try {
            // Log antes de la llamada
            Log::info('Making API request', [
                'endpoint' => $endpoint,
                'url' => "{$this->baseUrl}{$endpoint}",
                'apiKeyLength' => strlen($this->apiKey),
                'apiKeyPreview' => substr($this->apiKey, 0, 10) . '...'
            ]);

            $response = Http::withHeaders([
                'X-CSCAPI-KEY' => trim($this->apiKey) // Aseguramos que no haya espacios
            ])->get("{$this->baseUrl}{$endpoint}");

            if ($response->successful()) {
                $data = $response->json();
                Log::info('API request successful', [
                    'status' => $response->status(),
                    'dataType' => gettype($data),
                    'sample' => is_array($data) && !empty($data) ? array_slice($data, 0, 1) : $data
                ]);
                return $data;
            }

            Log::error('API request failed', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return [];
        } catch (\Exception $e) {
            Log::error('Exception in API request', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return [];
        }
    }
}