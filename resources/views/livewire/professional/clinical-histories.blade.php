{{-- resources/views/livewire/admin/dashboard.blade.php --}}

<x-slot name="title">Dashboard - ClinMind Care</x-slot>

<x-slot name="header">
    <div>
        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
        <p class="text-sm text-gray-500">Bienvenido de nuevo</p>
    </div>
</x-slot>
{{-- Los datos ahora vienen del controlador --}}
<div class="space-y-6">
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 animate-fade-in">
    
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b pb-4">
        <div class="w-full md:w-1/2 mb-4 md:mb-0">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input wire:model.live="search" type="search" 
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                           placeholder="Buscar por nombre o DNI...">
                </div>
                <div class="flex-1">
                    <select wire:model.live="filterProfessional" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">Todos los profesionales</option>
                        @foreach($professionals as $professional)
                            <option value="{{ $professional->id }}">{{ $professional->user->name }} {{ $professional->user->lastname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1">
                    <select wire:model.live="filterStatus" 
                            class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                        <option value="">Todos los estados</option>
                        <option value="active">Activas</option>
                        <option value="archived">Archivadas</option>
                        <option value="void">Anuladas</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Nueva Historia
            </button>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        N° Historia
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Paciente
                    </th>
                    <th class="hidden sm:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        DNI
                    </th>
                    <th class="hidden md:table-cell px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Fecha de Nacimiento
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Última Cita
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($histories as $history)
                <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">
                        HC{{ str_pad($history->id, 4, '0', STR_PAD_LEFT) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $history->patient->user->name }} {{ $history->patient->user->lastname }}
                        </div>
                    </td>
                    <td class="hidden sm:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $history->patient->user->dni }}
                    </td>
                    <td class="hidden md:table-cell px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $history->patient->user->date_of_birth->format('d/m/Y') }} 
                        ({{ $history->patient->user->age }} años)
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @php
                            $statusClasses = [
                                'active' => 'bg-green-100 text-green-800',
                                'archived' => 'bg-yellow-100 text-yellow-800',
                                'void' => 'bg-red-100 text-red-800'
                            ];
                            $statusText = [
                                'active' => 'Activa',
                                'archived' => 'Archivada',
                                'void' => 'Anulada'
                            ];
                        @endphp
                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$history->status] }}">
                            {{ $statusText[$history->status] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out p-2 rounded-full hover:bg-indigo-50" title="Ver Detalle">
                            <svg class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <a href="#" class="text-blue-600 hover:text-blue-900 transition duration-150 ease-in-out p-2 rounded-full hover:bg-blue-50" title="Editar">
                            <svg class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

<div class="mt-4">
    {{ $histories->links() }}
</div>
</div>