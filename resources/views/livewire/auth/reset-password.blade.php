{{-- resources/views/auth/reset-password.blade.php --}}
<x-guest-layout>
    <x-slot name="title">Restablecer contraseña - ClinMind Care</x-slot>

    <div class="w-full max-w-xl bg-white rounded-3xl shadow-2xl overflow-hidden p-8">
        <h2 class="text-2xl font-bold text-gray-900">Restablecer contraseña</h2>
        <p class="text-gray-600 text-sm mt-1">Ingresa tu nueva contraseña.</p>

        @if ($errors->any())
            <div class="mt-4 p-3 bg-red-50 border border-red-200 rounded-xl text-sm text-red-800">
                Hubo un problema, por favor verifica los campos.
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="mt-6 space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">

            <div>
                <label for="password" class="block text-sm font-semibold text-gray-800">Nueva contraseña</label>
                <input
                    type="password" id="password" name="password" required
                    class="mt-2 block w-full rounded-xl border @error('password') border-red-300 @else border-gray-300 @enderror
                           px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    placeholder="••••••••">
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-800">Confirmar contraseña</label>
                <input
                    type="password" id="password_confirmation" name="password_confirmation" required
                    class="mt-2 block w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-sky-600 hover:from-indigo-700 hover:to-sky-700
                           text-white font-semibold py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
                Guardar nueva contraseña
            </button>

            <div class="text-center">
                <a href="{{ route('login') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
                    Volver al login
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>
