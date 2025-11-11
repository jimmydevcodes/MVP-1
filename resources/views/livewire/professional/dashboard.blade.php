{{-- resources/views/livewire/admin/dashboard.blade.php --}}

<x-slot name="title">Dashboard - ClinMind Care</x-slot>

<x-slot name="header">
    <div>
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        <p class="text-sm text-gray-500">Bienvenido de nuevo</p>
    </div>

    <div class="flex items-center space-x-4">
        <button class="relative p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-50 rounded-lg transition">
            @include('icons.bell')
            <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
        </button>

        @php $u = Auth::user(); @endphp
        <div class="flex items-center space-x-3">
            <div class="text-right">
                <p class="text-sm font-medium text-gray-700">{{ $u->full_name ?? ($u->name ?? 'Usuario') }}</p>
                <p class="text-xs text-gray-500">
                    {{ $u->specialty ? ucfirst(str_replace('_',' ',$u->specialty)) : 'Profesional' }}
                </p>
            </div>
            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                <span class="text-white font-semibold text-sm">
                    {{ mb_substr($u->name ?? 'U',0,1) }}{{ mb_substr($u->lastname ?? '',0,1) }}
                </span>
            </div>
        </div>
    </div>
</x-slot>
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.5s ease-out;
    }
</style>
<div class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Card 1: Pacientes -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in hover:shadow-md transition-shadow">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center">
                @include('icons.users')
            </div>
            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-2 py-1 rounded-full">+0%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">0</h3>
        <p class="text-sm text-gray-500">Total Pacientes</p>
    </div>

    <!-- Card 2: Citas de Hoy -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in hover:shadow-md transition-shadow" style="animation-delay: 0.1s;">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-50 rounded-lg flex items-center justify-center">
                @include('icons.calendar')
            </div>
            <span class="text-xs font-semibold text-green-600 bg-green-50 px-2 py-1 rounded-full">Hoy</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">0</h3>
        <p class="text-sm text-gray-500">Citas Programadas</p>
    </div>

    <!-- Card 3: Historias Clínicas -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in hover:shadow-md transition-shadow" style="animation-delay: 0.2s;">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-50 rounded-lg flex items-center justify-center">
                @include('icons.clipboard')
            </div>
            <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-2 py-1 rounded-full">Este mes</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">0</h3>
        <p class="text-sm text-gray-500">Historias Registradas</p>
    </div>

    <!-- Card 4: Horas Disponibles -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in hover:shadow-md transition-shadow" style="animation-delay: 0.3s;">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-50 rounded-lg flex items-center justify-center">
                @include('icons.clock')
            </div>
            <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2 py-1 rounded-full">Semana</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-1">40h</h3>
        <p class="text-sm text-gray-500">Horas Disponibles</p>
    </div>
</div>

<!-- Main Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card (2 columnas) -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in" style="animation-delay: 0.4s;">
        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center">
            <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center mr-3">
                @include('icons.dashboard')
            </div>
            Resumen del Perfil
        </h3>
        
        <div class="grid grid-cols-2 gap-4">
            <div class="space-y-3">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Nombre Completo</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->full_name }}</p>
                </div>
                
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">{{ Auth::user()->document_type }}</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->document_number }}</p>
                </div>
                
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Teléfono</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->phone }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Especialidad</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->specialty ? ucfirst(str_replace('_', ' ', Auth::user()->specialty)) : 'Sin especialidad' }}</p>
                </div>
            </div>

            <div class="space-y-3">
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Email</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->email }}</p>
                </div>
                
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Fecha de Nacimiento</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->date_of_birth->format('d/m/Y') }} ({{ Auth::user()->age }} años)</p>
                </div>
                
                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">País / Ciudad</p>
                    <p class="text-sm text-gray-800 font-medium">{{ Auth::user()->country }} / {{ Auth::user()->city }}</p>
                </div>

                <div>
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Último Acceso</p>
                    <p class="text-sm text-gray-800 font-medium">
                        @if(Auth::user()->last_login_at)
                            {{ Auth::user()->last_login_at->format('d/m/Y H:i') }}
                            <span class="text-xs text-gray-500">({{ Auth::user()->last_login_at->diffForHumans() }})</span>
                        @else
                            <span class="text-gray-500">Primer acceso</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-4 pt-4 border-t border-gray-100">
            <p class="text-xs font-medium text-gray-500 uppercase tracking-wider mb-1">Dirección Completa</p>
            <p class="text-sm text-gray-800">{{ Auth::user()->address }}, {{ Auth::user()->city }} - {{ Auth::user()->postal_code }}</p>
        </div>
    </div>

    <!-- Sidebar Widgets -->
    <div class="space-y-6">
        <!-- Acciones Rápidas -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in" style="animation-delay: 0.5s;">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Acciones Rápidas</h3>
            <div class="space-y-2">
                <a href="#" class="w-full flex items-center justify-between p-3 bg-blue-50 hover:bg-blue-100 rounded-lg transition text-blue-700 font-medium text-sm">
                    <span>Nuevo Paciente</span>
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
                
                <a href="#" class="w-full flex items-center justify-between p-3 bg-green-50 hover:bg-green-100 rounded-lg transition text-green-700 font-medium text-sm">
                    <span>Agendar Cita</span>
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
                
                <a href="#" class="w-full flex items-center justify-between p-3 bg-purple-50 hover:bg-purple-100 rounded-lg transition text-purple-700 font-medium text-sm">
                    <span>Ver Agenda</span>
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- Próximas Citas (placeholder) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in" style="animation-delay: 0.6s;">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Próximas Citas</h3>
            <div class="text-center py-8">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p class="text-sm text-gray-500">No hay citas programadas</p>
                <button class="mt-3 px-4 py-2 text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Agendar primera cita
                </button>
            </div>
        </div>

    </div>
</div>