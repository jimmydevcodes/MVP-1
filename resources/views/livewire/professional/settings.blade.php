<div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-900">Configuración</h2>
        
        <div class="mt-6 bg-white shadow sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <!-- Perfil Profesional -->
                <div class="space-y-6">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Perfil Profesional</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Actualiza tu información profesional y de contacto.</p>
                        </div>
                    </div>
                    
                    <div class="mt-5 md:col-span-2">
                        <form wire:submit.prevent="saveProfile">
                            <div class="grid grid-cols-6 gap-6">
                                <!-- Nombre -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" wire:model="name" id="first-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <!-- Apellido -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Apellido</label>
                                    <input type="text" wire:model="lastname" id="last-name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <!-- Especialidad -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="specialty" class="block text-sm font-medium text-gray-700">Especialidad</label>
                                    <select wire:model="specialty" id="specialty" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option value="psicologia">Psicología</option>
                                        <option value="psiquiatria">Psiquiatría</option>
                                        <option value="terapeuta">Terapia</option>
                                    </select>
                                </div>

                                <!-- Número de Licencia -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="license" class="block text-sm font-medium text-gray-700">Número de Licencia</label>
                                    <input type="text" wire:model="license" id="license" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <!-- Teléfono -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="tel" wire:model="phone" id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <!-- Email -->
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                                    <input type="email" wire:model="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Guardar Cambios
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Preferencias -->
                <div class="mt-10 pt-10 border-t border-gray-200">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Preferencias</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Configura tus preferencias de notificaciones y visualización.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <form wire:submit.prevent="savePreferences">
                            <div class="space-y-6">
                                <!-- Notificaciones -->
                                <div class="relative flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input wire:model="emailNotifications" type="checkbox" id="email-notifications" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="email-notifications" class="font-medium text-gray-700">Notificaciones por Email</label>
                                        <p class="text-gray-500">Recibe notificaciones sobre nuevas citas y actualizaciones.</p>
                                    </div>
                                </div>

                                <!-- Zona Horaria -->
                                <div>
                                    <label for="timezone" class="block text-sm font-medium text-gray-700">Zona Horaria</label>
                                    <select wire:model="timezone" id="timezone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                        <option value="America/Lima">Lima (GMT-5)</option>
                                        <option value="America/Bogota">Bogotá (GMT-5)</option>
                                        <option value="America/Santiago">Santiago (GMT-4)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Guardar Preferencias
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Seguridad -->
                <div class="mt-10 pt-10 border-t border-gray-200">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Seguridad</h3>
                        <div class="mt-2 max-w-xl text-sm text-gray-500">
                            <p>Actualiza tu contraseña y configura la seguridad de tu cuenta.</p>
                        </div>
                    </div>

                    <div class="mt-5">
                        <form wire:submit.prevent="updatePassword">
                            <div class="space-y-6">
                                <div>
                                    <label for="current-password" class="block text-sm font-medium text-gray-700">Contraseña Actual</label>
                                    <input type="password" wire:model="currentPassword" id="current-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="new-password" class="block text-sm font-medium text-gray-700">Nueva Contraseña</label>
                                    <input type="password" wire:model="newPassword" id="new-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>

                                <div>
                                    <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirmar Nueva Contraseña</label>
                                    <input type="password" wire:model="newPasswordConfirmation" id="confirm-password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    Actualizar Contraseña
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>