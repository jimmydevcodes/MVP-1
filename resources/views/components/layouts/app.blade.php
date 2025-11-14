{{-- resources/views/components/layouts/app.blade.php --}}
@props([
    'pageTitle' => config('app.name', 'ClinMind Care'),
    'headerTitle' => 'Dashboard',
    'headerSubtitle' => 'Bienvenido de nuevo',
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Title: prioriza slot "title", luego prop pageTitle --}}
    <title>
        @if (isset($title) && trim($title) !== '')
            {{ strip_tags($title) }}
        @else
            {{ $pageTitle }}
        @endif
    </title>
    {{-- Vite (Tailwind/JS) --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
    @stack('styles')
</head>
<body class="bg-gray-50 font-sans antialiased">
    <div class="flex min-h-screen overflow-hidden">
      @auth
          @include('components.sidebar')
      @endauth
        {{-- Área principal --}}
        <div class="flex-1 flex flex-col overflow-hidden">
        @auth
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">
                @if (isset($header))
                    {{ $header }}
                @else
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $headerTitle }}</h2>
                        <p class="text-sm text-gray-500">{{ $headerSubtitle }}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="relative p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-lg transition">
                            @include('icons.bell')
                            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                        </button>
                        <div class="flex items-center space-x-3">
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-700">
                                    {{ optional(Auth::user())->full_name ?? 'Usuario' }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    @php
                                        $spec = optional(Auth::user())->specialty;
                                    @endphp
                                    {{ $spec ? ucfirst(str_replace('_', ' ', $spec)) : 'Profesional' }}
                                </p>
                            </div>
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                @php
                                    $u = Auth::user();
                                    $ini = $u ? mb_substr($u->name ?? '', 0, 1) . mb_substr($u->lastname ?? '', 0, 1) : 'U';
                                @endphp
                                <span class="text-white font-semibold text-sm">{{ $ini }}</span>
                            </div>
                        </div>
                    </div>
                @endif
            </header>
        @endauth
            {{-- Contenido de página --}}
            <main class="flex-1 overflow-y-auto p-6">
                @if (session('status'))
                    <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                        <p class="text-sm text-green-800">{{ session('status') }}</p>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-sm text-red-800">{{ session('error') }}</p>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
    @stack('scripts')
    @livewireScripts
</body>
</html>
