{{-- Fondo de página con patrón y efecto de desenfoque --}}
<div class="fixed inset-0 h-full w-full">
    {{-- Fondo a pantalla completa --}}
    <div class="absolute inset-0 w-full h-full bg-cover bg-center bg-no-repeat"
         style="background-image: url('{{ asset('images/backgrounds/auth-bg.jpg') }}');">
    </div>
    
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900/40 to-black/50 backdrop-blur-sm"></div>
        <div class="relative min-h-screen w-full overflow-auto">
        <div class="min-h-screen w-full flex items-center justify-center p-4">
            <div class="w-full max-w-7xl bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl overflow-hidden mx-auto relative z-10">
  <div class="flex flex-col lg:flex-row">
    <div class="lg:w-1/3 relative p-10 text-white bg-gradient-to-br from-indigo-700 via-blue-700 to-sky-800">
      <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div class="absolute -top-16 left-10 w-64 h-64 bg-white/25 blur-3xl rounded-full"></div>
        <div class="absolute bottom-10 -right-10 w-96 h-96 bg-sky-300/60 blur-3xl rounded-full"></div>
      </div>

      <div class="relative z-10 h-full flex flex-col justify-between">
        <div>
          <div class="inline-flex items-center justify-center w-14 h-14 bg-white/15 backdrop-blur-md rounded-xl mb-4 shadow-lg">
            <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
            </svg>
          </div>
          <h1 class="text-3xl font-bold">ClinMind Care</h1>
          <p class="text-sky-100 mt-1">Crea tu cuenta profesional</p>

          <div class="mt-8 space-y-4">
            <div class="flex items-center space-x-3">
              <span class="w-8 h-8 bg-white/15 backdrop-blur-md rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M5 13a9 9 0 1114 0 9 9 0 01-14 0z"/>
                </svg>
              </span>
              <span class="text-sm">Gestión integral de pacientes</span>
            </div>
            <div class="flex items-center space-x-3">
              <span class="w-8 h-8 bg-white/15 backdrop-blur-md rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 21h14a2 2 0 002-2V9H3v10a2 2 0 002 2z"/>
                </svg>
              </span>
              <span class="text-sm">Agenda y recordatorios</span>
            </div>
            <div class="flex items-center space-x-3">
              <span class="w-8 h-8 bg-white/15 backdrop-blur-md rounded-lg flex items-center justify-center">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c2.5 0 4.5-2 4.5-4.5S14.5 2 12 2 7.5 4 7.5 6.5 9.5 11 12 11zm0 2c-3.866 0-7 2.239-7 5v2h14v-2c0-2.761-3.134-5-7-5z"/>
                </svg>
              </span>
              <span class="text-sm">Privacidad y seguridad</span>
            </div>
          </div>
        </div>

        <div class="pt-6 border-t border-white/20">
          <p class="text-sm text-sky-100 mb-2">¿Ya tienes cuenta?</p>
          <a href="{{ route('login') }}"
             class="inline-flex items-center px-5 py-2.5 bg-white/15 hover:bg-white/25 rounded-xl font-medium transition backdrop-blur-md">
            Inicia sesión
          </a>
        </div>
      </div>
    </div>

    {{-- Panel Derecho - Formulario --}}
    <div class="lg:w-2/3 relative">
      <div class="h-[calc(100vh-4rem)] overflow-y-auto custom-scrollbar p-8">
        <div class="max-w-4xl mx-auto">
        <div class="mb-6">
          <h2 class="text-2xl font-bold text-gray-900">Crear cuenta profesional</h2>
          <p class="text-gray-600 text-sm">Completa tus datos para empezar</p>
        </div>

        @if ($errors->any())
          <div class="mb-5 p-3 bg-red-50 border border-red-200 rounded-xl">
            <p class="text-sm text-red-800 font-medium">Por favor, corrige los errores del formulario</p>
          </div>
        @endif

        <form wire:submit="register" class="space-y-5">
          {{-- Info personal --}}
          <section class="bg-gray-50 rounded-xl p-4 border border-gray-100">
            <h3 class="text-xs font-semibold text-gray-700 uppercase tracking-wide mb-3">Información personal</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              {{-- Tipo de Documento --}}
              <div class="relative">
                <label for="document_type" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Documento</label>
                <div class="relative rounded-md shadow-sm">
                  <select wire:model="document_type"
                         id="document_type"
                         class="block w-full rounded-md border @error('document_type') border-red-300 @else border-gray-300 @enderror
                                py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200">
                    <option value="">Seleccionar tipo</option>
                    <option value="dni">DNI (8 dígitos)</option>
                    <option value="carnet_extranjeria">Carnet de Extranjería (12 dígitos)</option>
                  </select>
                </div>
                @error('document_type')
                  <p class="mt-1 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              {{-- Número de Documento --}}
              <div class="relative">
                <label for="document_number" class="block text-sm font-medium text-gray-700 mb-1">Número de Documento</label>
                <div class="relative rounded-md shadow-sm">
                  <input type="text"
                         wire:model="document_number"
                         wire:change="searchDNI"
                         id="document_number"
                         class="block w-full rounded-md border @error('document_number') border-red-300 @else border-gray-300 @enderror
                                pr-10 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                         maxlength="{{ $this->maxDocumentLength() }}"
                         placeholder="Ingrese su documento">
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1" />
                    </svg>
                  </div>
                </div>
                @error('document_number')
                  <p class="mt-1 text-sm text-red-600 flex items-center">
                    <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    {{ $message }}
                  </p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">
                  @if(empty($document_type))
                    <span>⚠️ Seleccione un tipo de documento primero</span>
                  @elseif($document_type === 'dni')
                    <span>💡 Ingrese 8 dígitos. Se completarán automáticamente sus datos.</span>
                  @elseif($document_type === 'carnet_extranjeria')
                    <span>💡 Ingrese 12 dígitos (ingreso manual)</span>
                  @endif
                </p>
              </div>

              {{-- Nombre --}}
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" wire:model="name" id="name"
                       class="block w-full rounded-md border @error('name') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Apellidos --}}
              <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Apellidos</label>
                <input type="text" wire:model="lastname" id="lastname"
                       class="block w-full rounded-md border @error('lastname') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('lastname') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>

            {{-- Email --}}
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
              <input type="email" wire:model="email" id="email"
                     class="block w-full rounded-md border @error('email') border-red-300 @else border-gray-300 @enderror
                            py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
          </section>

          {{-- Datos Complementarios --}}
          <div class="space-y-4">
            <h3 class="text-lg font-medium">Datos Complementarios</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
                <input type="date" wire:model="date_of_birth" id="date_of_birth"
                       class="block w-full rounded-md border @error('date_of_birth') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('date_of_birth') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" wire:model="phone" id="phone" maxlength="9"
                       class="block w-full rounded-md border @error('phone') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('phone') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          {{-- Ubicación --}}
          <div class="space-y-4">
            <h3 class="text-lg font-medium">Ubicación</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              {{-- País --}}
              <div>
                <label for="country" class="block text-sm font-medium text-gray-700">País</label>
                <select
                  wire:model.live="selectedCountry"
                  id="country"
                  class="block w-full rounded-md border border-gray-300 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <option value="">Seleccione un país</option>
                  @foreach($countries as $country)
                    <option wire:key="country-{{ $country['iso2'] }}" value="{{ $country['iso2'] }}">
                      {{ $country['name'] }} {{ $country['emoji'] }}
                    </option>
                  @endforeach
                </select>
                @error('selectedCountry') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Estado/Región --}}
              <div>
                <label for="state" class="block text-sm font-medium text-gray-700">Estado/Región</label>
                <select
                  wire:model.live="selectedState"
                  id="state"
                  class="block w-full rounded-md border border-gray-300 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                  @disabled(empty($selectedCountry) || empty($states))
                  wire:loading.attr="disabled"
                  wire:target="selectedCountry">
                  <option value="">Seleccione un estado</option>
                  @foreach($states as $state)
                    <option wire:key="state-{{ $state['iso2'] }}" value="{{ $state['iso2'] }}">{{ $state['name'] }}</option>
                  @endforeach
                </select>
                @error('selectedState') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Ciudad --}}
              <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Ciudad</label>
                <select
                  wire:model="selectedCity"
                  id="city"
                  class="block w-full rounded-md border @error('city') border-red-300 @else border-gray-300 @enderror py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                  @disabled(empty($selectedState) || empty($cities))
                  wire:loading.attr="disabled"
                  wire:target="selectedState">
                  <option value="">Seleccione una ciudad</option>
                  @foreach($cities as $city)
                    <option wire:key="city-{{ $city['name'] }}" value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                  @endforeach
                </select>
                @error('city') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              <input type="hidden" wire:model="city">

              {{-- Código Postal --}}
              <div>
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Código Postal</label>
                <input type="text" wire:model="postal_code" id="postal_code"
                       class="block w-full rounded-md border @error('postal_code') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('postal_code') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>

              {{-- Dirección --}}
              <div class="md:col-span-2">
                <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input type="text" wire:model="address" id="address"
                       class="block w-full rounded-md border @error('address') border-red-300 @else border-gray-300 @enderror
                              py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                @error('address') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>

          {{-- Especialidad --}}
          <div>
            <label for="specialty" class="block text-sm font-medium text-gray-700">Especialidad</label>
            <select wire:model="specialty" id="specialty"
                    class="block w-full rounded-md border @error('specialty') border-red-300 @else border-gray-300 @enderror
                           py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              <option value="">Seleccione una especialidad</option>
              <option value="psicologia">Psicología</option>
              <option value="psiquiatria">Psiquiatría</option>
            </select>
            @error('specialty') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
          </div>

          {{-- Número de Colegiatura --}}
          <div>
            <label for="license_number" class="block text-sm font-medium text-gray-700">Número de Colegiatura (CPsP)</label>
            <div class="relative">
              <input type="text" 
                     wire:model="license_number" 
                     id="license_number"
                     maxlength="5"
                     class="block w-full rounded-md border @error('license_number') border-red-300 @else border-gray-300 @enderror
                            py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     placeholder="Ejemplo: 12345">
              <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 100 2h4a1 1 0 100-2H8z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            @error('license_number') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            <p class="mt-1 text-xs text-gray-500">Ingrese su número de colegiatura del Colegio de Psicólogos del Perú (5 dígitos)</p>
          </div>

          {{-- Contraseña --}}
          <div class="space-y-4">
            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
              <input type="password" wire:model="password" id="password"
                     class="block w-full rounded-md border @error('password') border-red-300 @else border-gray-300 @enderror
                            py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
              @error('password') 
                <span class="text-red-600 text-sm">{{ $message }}</span> 
              @else
                <span class="text-gray-500 text-xs mt-1">La contraseña debe contener al menos una letra</span>
              @enderror
            </div>

            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
              <input type="password" wire:model="password_confirmation" id="password_confirmation"
                     class="block w-full rounded-md border border-gray-300 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
          </div>

          {{-- Términos --}}
          <div class="bg-indigo-50 rounded-lg p-6 border border-indigo-100">
            <div class="flex items-center mb-4">
              <input type="checkbox" wire:model="terms" id="terms"
                     class="h-5 w-5 rounded border-indigo-300 text-indigo-600 focus:ring-indigo-500 transition">
              <label for="terms" class="ml-3 block text-sm text-gray-700">
                Acepto los
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 underline">términos y condiciones</a>
                y la
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500 underline">política de privacidad</a>
              </label>
            </div>
            @error('terms')
              <p class="mt-2 text-sm text-red-600 flex items-center">
                <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                {{ $message }}
              </p>
            @enderror
          </div>

          <div class="mt-8">
            <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md
                           text-white bg-gradient-to-r from-indigo-600 to-sky-600 hover:from-indigo-700 hover:to-sky-700
                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 shadow-lg hover:shadow-xl">
              <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                <svg class="h-5 w-5 text-indigo-200 group-hover:text-indigo-100 transition" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 116 0z" clip-rule="evenodd" />
                </svg>
              </span>
              Completar Registro
            </button>
          </div>

          <div class="mt-6 text-center text-sm">
            <p class="text-gray-600">
              ¿Ya tienes una cuenta?
              <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">
                Inicia sesión aquí
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
</div>

@push('scripts')
<script>
  document.addEventListener('livewire:load', function () {
    document.querySelectorAll('input, select').forEach(element => {
      element.addEventListener('focus', function() {
        this.closest('.relative')?.classList.add('scale-105');
        this.classList.add('ring-2', 'ring-indigo-500/50');
      });
      element.addEventListener('blur', function() {
        this.closest('.relative')?.classList.remove('scale-105');
        this.classList.remove('ring-2', 'ring-indigo-500/50');
      });
    });
  });
</script>
@endpush

@push('styles')
<style>
  .shake { animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both; }
  @keyframes shake {
    10%, 90% { transform: translate3d(-1px, 0, 0); }
    20%, 80% { transform: translate3d(2px, 0, 0); }
    30%, 50%, 70% { transform: translate3d(-2px, 0, 0); }
    40%, 60% { transform: translate3d(2px, 0, 0); }
  }
  .relative { transition: transform 0.2s ease-in-out; }
  input, select { transition: all 0.2s ease-in-out; }

  /* Estilos personalizados para el scrollbar */
  .custom-scrollbar::-webkit-scrollbar {
    width: 8px;
  }

  .custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(247, 248, 249, 0.3);
    border-radius: 4px;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(99, 102, 241, 0.3);
    border-radius: 4px;
    transition: all 0.3s ease;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(99, 102, 241, 0.5);
  }

  /* Para Firefox */
  .custom-scrollbar {
    scrollbar-width: thin;
    scrollbar-color: rgba(99, 102, 241, 0.3) rgba(247, 248, 249, 0.3);
  }

  /* Ajustes para asegurar que el contenedor principal no haga scroll */
  .fixed.inset-0 {
    overflow: hidden;
  }
</style>
@endpush
