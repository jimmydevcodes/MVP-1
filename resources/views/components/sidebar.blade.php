<aside class="w-64 bg-white border-r border-gray-200 flex flex-col transition-all duration-300 ease-in-out" x-data="{ expanded: true }">    <div class="h-16 flex items-center justify-between px-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center">
                @include('icons.heart-pulse')
            </div>
            <div>
                <h1 class="text-lg font-bold text-gray-800">ClinMind</h1>
                <p class="text-xs text-gray-500">Care Platform</p>
            </div>
        </div>
    </div>
    <div class="p-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-blue-100 to-blue-200 rounded-full flex items-center justify-center">
                <span class="text-blue-700 font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}</span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-gray-500 truncate">{{ Auth::user()->specialty ? ucfirst(str_replace('_', ' ', Auth::user()->specialty)) : 'Profesional' }}</p>
            </div>
        </div>
    </div>
    <nav class="flex-1 overflow-y-auto py-4">
        <div class="px-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition-colors duration-150 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700' : 'text-gray-700 hover:bg-gray-50' }}">
                @include('icons.dashboard')
                <span class="ml-3">Dashboard</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.users')
                <span class="ml-3">Pacientes</span>
                <span class="ml-auto bg-blue-100 text-blue-700 text-xs font-semibold px-2 py-0.5 rounded-full">Próx.</span>
            </a>
            <a href="{{ route('professional.clinical_histories') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.clipboard')
                <span class="ml-3">Historias Clínicas</span>
            </a>
            <a href="{{ route('professional.appointments') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.calendar')
                <span class="ml-3">Citas y Agendas</span>
            </a>
            <a href="{{ route('professional.availability') }}" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.clock')
                <span class="ml-3">Disponibilidad</span>
            </a>
            <div class="pt-4 pb-2">
                <div class="px-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Gestión</div>
            </div>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.bell')
                <span class="ml-3">Notificaciones</span>
                <span class="ml-auto bg-red-100 text-red-700 text-xs font-semibold px-2 py-0.5 rounded-full">3</span>
            </a>
            <a href="#" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.chart')
                <span class="ml-3">Informes</span>
            </a>
        </div>
    </nav>
    <!-- Acciones del footer -->
    <div class="mt-auto p-4 border-t border-gray-200">
        <div class="flex flex-col space-y-1">
            <a href="{{ route('professional.settings') }}" class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                @include('icons.settings')
                <span class="ml-3">Configuración</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center px-3 py-2 text-sm font-medium rounded-lg text-red-600 hover:bg-red-50 transition-colors duration-150">
                    @include('icons.logout')
                    <span class="ml-3">Cerrar Sesión</span>
                </button>
            </form>
        </div>
    </div>
</aside>