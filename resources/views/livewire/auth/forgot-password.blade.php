{{-- resources/views/auth/forgot-password.blade.php --}}
<x-guest-layout>
    <x-slot name="title">Recuperar contraseña - ClinMind Care</x-slot>

    <div class="w-full max-w-3xl bg-white rounded-3xl shadow-2xl overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-2">
            {{-- Lado izquierdo (branding simple) --}}
            <div class="hidden md:block p-8 text-white bg-gradient-to-br from-indigo-700 via-blue-700 to-sky-800 relative">
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="absolute -top-12 -left-10 w-64 h-64 bg-white/30 blur-3xl rounded-full"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 bg-sky-300/60 blur-3xl rounded-full"></div>
                </div>

                <div class="relative z-10 space-y-2">
                    <div class="inline-flex items-center justify-center w-14 h-14 bg-white/15 backdrop-blur-md rounded-xl shadow-lg">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold">ClinMind Care</h1>
                    <p class="text-sky-100">Te enviaremos un enlace para restablecer tu contraseña.</p>
                </div>
            </div>

            {{-- Formulario --}}
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900">¿Olvidaste tu contraseña?</h2>
                <p class="text-gray-600 text-sm mt-1">Ingresa tu correo y te enviaremos el enlace de recuperación.</p>

                {{-- Mensajes de estado / error --}}
                @if (session('status'))
                    <div class="mt-4 p-3 bg-emerald-50 border border-emerald-200 rounded-xl text-sm text-emerald-800">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-800">
                        Por favor, revisa los datos ingresados.
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-800">Correo electrónico</label>
                        <input
                            type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            class="mt-2 block w-full rounded-xl border @error('email') border-red-300 @else border-gray-300 @enderror
                                   px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                            placeholder="tu@email.com">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full bg-gradient-to-r from-indigo-600 to-sky-600 hover:from-indigo-700 hover:to-sky-700
                                   text-white font-semibold py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
                        Enviarme el enlace
                    </button>

                    <div class="text-center">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                            Volver a iniciar sesión
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
