<x-guest-layout>
    <x-slot name="title">Iniciar Sesión - ClinMind Care</x-slot>

<div class="fixed inset-0 h-full w-full">
    {{-- Fondo a pantalla completa --}}
    <div class="absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('images/backgrounds/auth-bg.jpg') }}');">
    </div>
    
    {{-- Capa de superposición con efecto de desenfoque --}}
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900/40 to-black/50 backdrop-blur-sm"></div>
    
    {{-- Contenedor de scroll --}}
    <div class="relative min-h-screen w-full overflow-auto">
        {{-- Contenedor de centrado --}}
        <div class="min-h-screen w-full flex items-center justify-center p-4">
            {{-- Contenedor principal con efecto de cristal --}}
            <div class="w-full max-w-6xl bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden relative z-10">
  <div class="flex flex-col lg:flex-row min-h-[420px]">
    <div class="lg:w-2/5 relative p-10 text-white bg-gradient-to-br from-indigo-700 via-blue-700 to-sky-800">
      <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute -top-10 -left-10 w-80 h-80 bg-white/30 blur-3xl rounded-full"></div>
        <div class="absolute bottom-0 right-0 w-[28rem] h-[28rem] bg-sky-300/60 blur-3xl rounded-full"></div>
      </div>

      <div class="relative z-10 h-full flex flex-col">
        <div class="mb-10">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-white/15 backdrop-blur-md rounded-2xl mb-5 shadow-lg">
            <svg class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 11c1.657 0 3-1.567 3-3.5S13.657 4 12 4s-3 1.567-3 3.5S10.343 11 12 11zM19 20a7 7 0 10-14 0h14z" />
            </svg>
          </div>
          <h1 class="text-4xl font-bold tracking-tight">ClinMind Care</h1>
          <p class="text-sky-100 mt-1">Plataforma para especialistas en salud mental</p>
        </div>

        <div class="space-y-5 mt-2">
          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md flex items-center justify-center">
              <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M8 7V3m8 4V3M5 21h14a2 2 0 002-2V9H3v10a2 2 0 002 2z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold">Agenda clínica</h3>
              <p class="text-sky-100/90 text-sm">Citas, recordatorios y disponibilidad inteligente.</p>
            </div>
          </div>
          <div class="flex items-start space-x-4">
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-md flex items-center justify-center">
              <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-3.866 0-7 2.239-7 5 0 2.761 3.134 5 7 5s7-2.239 7-5c0-2.761-3.134-5-7-5z" />
              </svg>
            </div>
            <div>
              <h3 class="font-semibold">Historias seguras</h3>
              <p class="text-sky-100/90 text-sm">Cumplimiento y cifrado para datos sensibles.</p>
            </div>
          </div>
        </div>

        <div class="mt-auto pt-8 border-t border-white/20">
          <p class="text-sm text-sky-100 mb-3">¿Aún no tienes cuenta?</p>
          <a href="{{ route('register') }}"
             class="inline-flex items-center px-6 py-3 bg-white/15 hover:bg-white/25 rounded-xl font-medium transition-all duration-300 backdrop-blur-md">
            Crear cuenta profesional
            <svg class="w-5 h-5 ml-2" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5-5 5M6 12h12"/>
            </svg>
          </a>
        </div>
      </div>
    </div>

    <!-- Panel Derecho: Formulario -->
    <div class="lg:w-3/5 p-12 flex items-center">
      <div class="w-full max-w-md mx-auto">
        <div class="mb-8">
          <h2 class="text-3xl font-bold text-gray-900">Bienvenido</h2>
          <p class="text-gray-600 mt-1">Accede a tu panel de especialista</p>
        </div>

        @if (session('status'))
          <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 rounded-xl">
            <p class="text-sm text-emerald-800 font-medium">{{ session('status') }}</p>
          </div>
        @endif
        @if (session('error'))
          <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-sm text-red-800 font-medium">{{ session('error') }}</p>
          </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
          @csrf

          <div>
            <label for="email" class="block text-sm font-semibold text-gray-800">Correo electrónico</label>
            <div class="relative mt-2">
              <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9" />
                </svg>
              </span>
              <input
                type="email" id="email" name="email" value="{{ old('email') }}"
                class="block w-full pl-12 pr-4 py-3.5 rounded-xl border @error('email') border-red-300 @else border-gray-300 @enderror
                       focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                placeholder="tu@email.com" required autofocus>
            </div>
            @error('email')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="password" class="block text-sm font-semibold text-gray-800">Contraseña</label>
            <div class="relative mt-2">
              <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2M6 19h12a2 2 0 002-2v-6H4v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
              </span>
              <input
                type="password" id="password" name="password"
                class="block w-full pl-12 pr-12 py-3.5 rounded-xl border @error('password') border-red-300 @else border-gray-300 @enderror
                       focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                placeholder="••••••••" required>
              <button type="button" id="togglePassword"
                      class="absolute inset-y-0 right-0 pr-4 flex items-center rounded-r-xl text-gray-400 hover:text-gray-600">
                <svg id="eyeIcon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
              </button>
            </div>
            @error('password')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <div class="flex items-center justify-between">
            <label class="flex items-center cursor-pointer">
              <input type="checkbox" name="remember" id="remember"
                     class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                     {{ old('remember') ? 'checked' : '' }}>
              <span class="ml-2 text-sm text-gray-600">Recordarme</span>
            </label>
            <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-700">
              ¿Olvidaste tu contraseña?
            </a>
          </div>

          <button type="submit"
                  class="w-full bg-gradient-to-r from-indigo-600 to-sky-600 hover:from-indigo-700 hover:to-sky-700
                         text-white font-semibold py-4 rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl">
            Iniciar sesión
          </button>
        </form>

        <div class="mt-8 text-center text-sm text-gray-500">
          <p>© {{ date('Y') }} ClinMind Care. Todos los derechos reservados.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('togglePassword');
    const input = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    if (!btn || !input || !icon) return;
    btn.addEventListener('click', () => {
      const show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      icon.innerHTML = show
        ? '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M3 3l3.59 3.59A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411L21 21" />'
        : '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
    });
  });
</script>
@endpush
            </div>
        </div>
    </div>
</div>
</x-guest-layout>
