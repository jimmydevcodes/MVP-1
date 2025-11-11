<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para hacer esta petición
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para el registro
     */
    public function rules(): array
    {
        return [
            // ===== DATOS PERSONALES =====
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', // Solo letras y espacios
            ],

            'lastname' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            ],
            
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                'unique:users,email',
            ],
            'dni' => [
                'required_without:carnet_extrangeria', 
                'nullable',
                'string',
                'digits:8', 
                'unique:users,dni',
            ],

            'carnet_extrangeria' => [
                'required_without:dni', // DNI o Carnet requerido
                'nullable',
                'string',
                'digits:12', // Exactamente 12 dígitos
                'unique:users,carnet_extrangeria',
            ],
            
            'date_of_birth' => [
                'required',
                'date',
                'before:-18 years', // Mayor de 18 años
                'after:1900-01-01', 
            ],
            
            'phone' => [
                'required',
                'string',
                'digits:9', // Exactamente 9 dígitos
                'regex:/^9[0-9]{8}$/', 
            ],
            
            // ===== UBICACIÓN =====
            'address' => [
                'required',
                'string',
                'max:500',
            ],

            'country' => [
                'required',
                'string',
                'max:500',
            ],

            'city' => [
                'required',
                'string',
                'max:500',
            ],

            'postal_code' => [
                'required',
                'string',
                'max:10',
                'regex:/^[0-9]+$/', // Solo números
            ],
            
            // ===== PROFESIONAL =====
            'specialty' => [
                'required',
                'string',
                'in:psicologia,psiquiatria',
            ],
            
            'license_number' => [
                'required',
                'string',
                'digits:5',
                'unique:professionals,license_number',
            ],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8) // Aqui es donde solo estoy usando que requiera al menos una letra
                    ->letters() 
                    ->uncompromised() 
            ],
            
            'terms' => [
                'required',
                'accepted', // Debe estar marcado como true/yes/on/1
            ],
        ];
    }
    /**
     * Mensajes de error personalizados
     */
    public function messages(): array
    {
        return [
            // Name
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'name.regex' => 'El nombre solo puede contener letras y espacios.',

            // Lastname
            'lastname.required' => 'El apellido es obligatorio.',
            'lastname.max' => 'El apellido no puede exceder 255 caracteres.',
            'lastname.regex' => 'El apellido solo puede contener letras y espacios.',
            
            // Email
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no puede exceder 255 caracteres.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            
            // DNI
            'dni.required_without' => 'Debe proporcionar DNI o Carnet de Extranjería.',
            'dni.digits' => 'El DNI debe tener exactamente 8 dígitos.',
            'dni.unique' => 'Este DNI ya está registrado.',

            // Carnet Extranjería
            'carnet_extrangeria.required_without' => 'Debe proporcionar DNI o Carnet de Extranjería.',
            'carnet_extrangeria.digits' => 'El Carnet de Extranjería debe tener exactamente 12 dígitos.',
            'carnet_extrangeria.unique' => 'Este Carnet de Extranjería ya está registrado.',
            
            // Date of Birth
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria.',
            'date_of_birth.date' => 'Debe ingresar una fecha válida.',
            'date_of_birth.before' => 'Debes ser mayor de 18 años para registrarte.',
            'date_of_birth.after' => 'La fecha de nacimiento no es válida.',
            
            // Phone
            'phone.required' => 'El teléfono es obligatorio.',
            'phone.digits' => 'El teléfono debe tener exactamente 9 dígitos.',
            'phone.regex' => 'El teléfono debe empezar con 9 y tener 9 dígitos.',
            
            // Address
            'address.required' => 'La dirección es obligatoria.',
            'address.max' => 'La dirección no puede exceder 500 caracteres.',

            // Country
            'country.required' => 'El país es obligatorio.',
            'country.max' => 'El país no puede exceder 500 caracteres.',

            // City
            'city.required' => 'La ciudad es obligatoria.',
            'city.max' => 'La ciudad no puede exceder 500 caracteres.',

            // Postal Code
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.max' => 'El código postal no puede exceder 10 caracteres.',
            'postal_code.regex' => 'El código postal solo puede contener números.',
            
            // Specialty
            'specialty.required' => 'La especialidad es obligatoria.',
            'specialty.in' => 'La especialidad seleccionada no es válida.',

            // License Number
            'license_number.required' => 'El número de colegiatura es obligatorio.',
            'license_number.digits' => 'El número de colegiatura debe tener exactamente 5 dígitos.',
            'license_number.unique' => 'Este número de colegiatura ya está registrado.',
            
            // Password
            'password.required' => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            
            // Terms
            'terms.required' => 'Debes aceptar los términos y condiciones.',
            'terms.accepted' => 'Debes aceptar los términos y condiciones para continuar.',
        ];
    }

    /**
     * Nombres personalizados de atributos para mensajes de error
     */
    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo electrónico',
            'dni' => 'DNI',
            'carnet_extrangeria' => 'carnet de extranjería',
            'date_of_birth' => 'fecha de nacimiento',
            'phone' => 'teléfono',
            'address' => 'dirección',
            'country' => 'país',
            'city' => 'ciudad',
            'postal_code' => 'código postal',
            'specialty' => 'especialidad',
            'license_number' => 'número de colegiatura',
            'password' => 'contraseña',
            'password_confirmation' => 'confirmación de contraseña',
            'terms' => 'términos y condiciones',
        ];
    }

    /**
     * Configurar/limpiar datos después de la validación exitosa
     * 
     * Este método se ejecuta automáticamente DESPUÉS de que
     * todas las validaciones pasen correctamente
     */
    protected function passedValidation(): void
    {
        // Limpiar y formatear datos antes de guardar
        $this->merge([
            // Capitalizar nombres (Primera Letra En Mayúscula)
            'name' => ucwords(strtolower(trim($this->name))),
            'lastname' => ucwords(strtolower(trim($this->lastname))),
            
            // Email siempre en minúsculas
            'email' => strtolower(trim($this->email)),
            'dni' => $this->dni ? preg_replace('/\s+/', '', $this->dni) : null,
            'carnet_extrangeria' => $this->carnet_extrangeria ? preg_replace('/\s+/', '', $this->carnet_extrangeria) : null,
            'phone' => preg_replace('/\s+/', '', $this->phone),
            'postal_code' => preg_replace('/\s+/', '', $this->postal_code),
            
            'country' => ucwords(strtolower(trim($this->country))),
            'city' => ucwords(strtolower(trim($this->city))),
        ]);
    }
}