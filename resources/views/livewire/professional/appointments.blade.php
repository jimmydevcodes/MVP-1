<x-slot name="title">Citas y Agendas - ClinMind Care</x-slot>

<x-slot name="header">
    <div>
        <h2 class="text-xl font-semibold text-gray-800">Citas y Agendas</h2>
        <p class="text-sm text-gray-500">Gestión de citas y horarios</p>
    </div>
</x-slot>

<div class="space-y-6">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 border-b pb-4">
            <div class="w-full md:w-1/2 mb-4 md:mb-0">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <input wire:model.live="search" type="search" 
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                               placeholder="Buscar citas...">
                    </div>
                    <div class="flex-1">
                        <select wire:model.live="filterStatus" 
                                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                            <option value="">Todos los estados</option>
                            <option value="scheduled">Programada</option>
                            <option value="completed">Completada</option>
                            <option value="cancelled">Cancelada</option>
                            <option value="no_show">No asistió</option>
                        </select>
                    </div>
                </div>
            </div>
            <div>
                <button class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition duration-150 ease-in-out flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nueva Cita
                </button>
            </div>
        </div>

        @if(isset($error))
            <div class="rounded-md bg-red-50 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Error</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <p>{{ $error }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Fecha y Hora
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Paciente
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Profesional
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Modalidad
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($appointments as $appointment)
                    <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $appointment->date->format('d/m/Y') }}<br>
                            <span class="text-gray-500">
                                {{ $appointment->start_time->format('H:i') }} - {{ $appointment->end_time->format('H:i') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $appointment->patient->user->name }} {{ $appointment->patient->user->lastname }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                                {{ $appointment->professional->user->name }} {{ $appointment->professional->user->lastname }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ ucfirst($appointment->professional->specialty) }}
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $appointment->modality === 'remote' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                                {{ $appointment->modality === 'remote' ? 'Remoto' : 'Presencial' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusClasses = [
                                    'scheduled' => 'bg-blue-100 text-blue-800',
                                    'completed' => 'bg-green-100 text-green-800',
                                    'cancelled' => 'bg-red-100 text-red-800',
                                    'no_show' => 'bg-yellow-100 text-yellow-800'
                                ];
                                $statusText = [
                                    'scheduled' => 'Programada',
                                    'completed' => 'Completada',
                                    'cancelled' => 'Cancelada',
                                    'no_show' => 'No asistió'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClasses[$appointment->status] }}">
                                {{ $statusText[$appointment->status] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900 transition duration-150 ease-in-out p-2 rounded-full hover:bg-indigo-50" title="Ver Detalle">
                                <svg class="w-5 h-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

            @if($appointments->count() > 0)
                <div class="mt-4">
                    {{ $appointments->links() }}
                </div>
            @endif
        @endif
    </div>
</div>