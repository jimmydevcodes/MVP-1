<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body style="background-color: #f3f4f6;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="margin: 0; padding: 0; width: 100%;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width: 570px; margin: 0 auto; padding: 0;">
                    <!-- Header -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAAAwCAYAAAA/1CyWAAAACXBIWXMAAAsTAAALEwEAmpwYAAAKT2lDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVNnVFPpFj333vRCS4iAlEtvUhUIIFJCi4AUkSYqIQkQSoghodkVUcERRUUEG8igiAOOjoCMFVEsDIoK2AfkIaKOg6OIisr74Xuja9a89+bN/rXXPues852tz3vsuZ6OR/Lp8XHShVJtC4AQgAABAgALAAAAAoCAAIAAAQP//wAARCAAyAOADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD0CiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigD//2Q==" alt="{{ config('app.name') }}" style="height: 80px;">
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td style="background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);">
                            <h1 style="color: #1f2937; font-size: 24px; margin-bottom: 20px; text-align: center; font-weight: 600;">
                                Restablecimiento de Contraseña
                            </h1>

                            <p style="color: #4b5563; font-size: 16px; line-height: 1.6; margin-bottom: 25px; text-align: center;">
                                Hemos recibido una solicitud para restablecer la contraseña de tu cuenta en {{ config('app.name') }}.
                            </p>

                            @isset($actionText)
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $actionUrl }}" 
                                           style="background-color: #4f46e5; border-radius: 6px; color: #ffffff; display: inline-block; 
                                                  padding: 12px 24px; text-decoration: none; font-weight: 600;"
                                           target="_blank">
                                            Restablecer Contraseña
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="color: #6b7280; font-size: 14px; text-align: center; margin-top: 20px;">
                                Este enlace expirará en 60 minutos por seguridad.
                            </p>
                            @endisset

                            <div style="margin-top: 25px; padding: 15px; background-color: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">
                                <p style="color: #64748b; font-size: 14px; text-align: center; margin: 0;">
                                    Si no solicitaste restablecer tu contraseña, puedes ignorar este correo.<br>
                                    Tu cuenta permanece segura.
                                </p>
                            </div>

                            @isset($actionText)
                            <div style="margin-top: 25px; padding-top: 15px; border-top: 1px solid #e2e8f0;">
                                <p style="color: #64748b; font-size: 13px; text-align: center;">
                                    Si tienes problemas con el botón, copia y pega este enlace en tu navegador:<br>
                                    <a href="{{ $actionUrl }}" style="color: #4f46e5; text-decoration: none;">{{ $actionUrl }}</a>
                                </p>
                            </div>
                            @endisset
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <p style="color: #6b7280; font-size: 12px; text-align: center; margin: 0;">
                                © {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>