{{-- resources/views/components/layouts/guest.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    {{-- Fuentes opcionales --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Tailwind + app.js --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Livewire styles --}}
    @livewireStyles

    {{-- Stacks opcionales desde las vistas hijas --}}
    @stack('styles')
  </head>
  <body class="font-sans antialiased bg-gray-100">
    {{-- Contenido principal del componente Livewire --}}
    <main class="min-h-screen flex items-center justify-center p-6">
      {{ $slot }}
    </main>

    {{-- Stacks de scripts (si los usas en la vista hija) --}}
    @stack('scripts')

    {{-- Livewire scripts --}}
    @livewireScripts
  </body>
</html>
