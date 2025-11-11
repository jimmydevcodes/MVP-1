@component('mail::message')
<div style="text-align: center;">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 200px; margin-bottom: 20px;">
</div>

<div style="background-color: #ffffff; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
    <h2 style="color: #2d3748; font-size: 20px; margin-bottom: 15px; text-align: center;">
        Bienvenido a {{ $invitation->team->name }}
    </h2>

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::registration()))
    <div style="margin-bottom: 20px;">
        @component('mail::button', ['url' => route('register'), 'color' => 'success'])
        Crear Cuenta
        @endcomponent

        <p style="color: #4a5568; font-size: 14px; text-align: center; margin-top: 10px;">
            ¿Nuevo en nuestra plataforma? Crea tu cuenta primero
        </p>
    </div>
    @endif

    <div style="margin-top: 20px;">
        @component('mail::button', ['url' => $acceptUrl, 'color' => 'primary'])
        Unirse al Equipo
        @endcomponent

        <p style="color: #4a5568; font-size: 14px; text-align: center; margin-top: 10px;">
            ¿Ya tienes una cuenta? Haz clic arriba para unirte
        </p>
    </div>
</div>

<div style="text-align: center; margin-top: 30px; color: #718096; font-size: 13px;">
    <p>Esta invitación expirará en 7 días.</p>
    <p>Si no esperabas esta invitación, por favor ignora este correo.</p>
</div>

<div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e2e8f0; text-align: center;">
    <p style="color: #a0aec0; font-size: 12px;">
        © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
    </p>
</div>
@endcomponent
