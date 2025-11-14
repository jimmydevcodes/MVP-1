<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ==========================================
        // 1. USUARIO ADMIN
        // ==========================================
        $admin = new User();
        $admin->name = 'Admin';
        $admin->lastname = 'ClinMind';
        $admin->email = 'admin@clinmind.com';
        $admin->document_type = 'dni';
        $admin->document_number = '12345678';
        $admin->date_of_birth = '1985-06-15';
        $admin->phone = '987654321';
        $admin->address = 'Av. Principal 123, San Isidro';
        $admin->country = 'Perú';
        $admin->city = 'Lima';
        $admin->postal_code = '15073';
        $admin->role = 'admin';
        $admin->password = Hash::make('Password1!');
        $admin->email_verified_at = now();
        $admin->save();

        // ==========================================
        // 2. PSICÓLOGO
        // ==========================================
        $psicologo = new User();
        $psicologo->name = 'Carlos';
        $psicologo->lastname = 'Rodríguez';
        $psicologo->email = 'psicologo@clinmind.com';
        $psicologo->document_type = 'dni';
        $psicologo->document_number = '87654321';
        $psicologo->date_of_birth = '1990-03-22';
        $psicologo->phone = '912345678';
        $psicologo->address = 'Calle Las Flores 456, Miraflores';
        $psicologo->country = 'Perú';
        $psicologo->city = 'Lima';
        $psicologo->postal_code = '15074';
        $psicologo->role = 'professional';
        $psicologo->password = Hash::make('Password1!');
        $psicologo->email_verified_at = now();
        $psicologo->save();
        
        // Crear registro profesional
        $psicologo->professional()->create([
            'specialty' => 'psicologia',
            'license_number' => 'PSI' . rand(1000, 9999),
            'is_active' => true
        ]);

        // ==========================================
        // 3. EXTRANJERA (CON CARNET)
        // ==========================================
        $extranjera = new User();
        $extranjera->name = 'María';
        $extranjera->lastname = 'González';
        $extranjera->email = 'extranjera@clinmind.com';
        $extranjera->document_type = 'carnet_extranjeria';
        $extranjera->document_number = '123456789012';
        $extranjera->date_of_birth = '1988-11-08';
        $extranjera->phone = '998877665';
        $extranjera->address = 'Av. Benavides 789, Surco';
        $extranjera->country = 'Colombia';
        $extranjera->city = 'Lima';
        $extranjera->postal_code = '15048';
        $extranjera->role = 'professional';
        $extranjera->password = Hash::make('Password1!');
        $extranjera->email_verified_at = now();
        $extranjera->save();

        // Crear registro profesional
        $extranjera->professional()->create([
            'specialty' => 'psicologia',
            'license_number' => 'PSI' . rand(1000, 9999),
            'is_active' => true
        ]);

        // ==========================================
        // 4. PSIQUIATRA
        // ==========================================
        $psiquiatra = new User();
        $psiquiatra->name = 'Ana';
        $psiquiatra->lastname = 'Martínez';
        $psiquiatra->email = 'psiquiatra@clinmind.com';
        $psiquiatra->document_type = 'dni';
        $psiquiatra->document_number = '45678912';
        $psiquiatra->date_of_birth = '1982-07-19';
        $psiquiatra->phone = '987123456';
        $psiquiatra->address = 'Jr. Las Camelias 321, San Borja';
        $psiquiatra->country = 'Perú';
        $psiquiatra->city = 'Lima';
        $psiquiatra->postal_code = '15036';
        $psiquiatra->role = 'professional';
        $psiquiatra->password = Hash::make('Password1!');
        $psiquiatra->email_verified_at = now();
        $psiquiatra->save();

        // Crear registro profesional
        $psiquiatra->professional()->create([
            'specialty' => 'psiquiatria',
            'license_number' => 'PSQ' . rand(1000, 9999),
            'is_active' => true
        ]);

        // ==========================================
        // 5. TERAPEUTA SENIOR
        // ==========================================
        $terapeuta = new User();
        $terapeuta->name = 'Elena';
        $terapeuta->lastname = 'Ramírez';
        $terapeuta->email = 'terapeuta@clinmind.com';
        $terapeuta->document_type = 'dni';
        $terapeuta->document_number = '78945612';
        $terapeuta->date_of_birth = '1965-01-30';
        $terapeuta->phone = '965432178';
        $terapeuta->address = 'Av. Javier Prado 1024, La Molina';
        $terapeuta->country = 'Perú';
        $terapeuta->city = 'Lima';
        $terapeuta->postal_code = '15024';
        $terapeuta->role = 'professional';
        $terapeuta->password = Hash::make('Password1!');
        $terapeuta->email_verified_at = now();
        $terapeuta->save();

        // Crear registro profesional
        $terapeuta->professional()->create([
            'specialty' => 'terapeuta',
            'license_number' => 'TER' . rand(1000, 9999),
            'is_active' => true
        ]);

        // ==========================================
        // 6. PSICOLOGO JOVEN
        // ==========================================
        $psicologo_joven = new User();
        $psicologo_joven->name = 'Luis';
        $psicologo_joven->lastname = 'Torres';
        $psicologo_joven->email = 'test@clinmind.com';
        $psicologo_joven->document_type = 'dni';
        $psicologo_joven->document_number = '32165498';
        $psicologo_joven->date_of_birth = '1995-09-12';
        $psicologo_joven->phone = '923456789';
        $psicologo_joven->address = 'Calle Los Pinos 567, Barranco';
        $psicologo_joven->country = 'Perú';
        $psicologo_joven->city = 'Lima';
        $psicologo_joven->postal_code = '15063';
        $psicologo_joven->role = 'professional';
        $psicologo_joven->password = Hash::make('Password1!');
        $psicologo_joven->email_verified_at = now();
        $psicologo_joven->save();

        // Crear registro profesional
        $psicologo_joven->professional()->create([
            'specialty' => 'psicologia',
            'license_number' => 'PSI' . rand(1000, 9999),
            'is_active' => true
        ]);

        // ==========================================
        // 7-20: USUARIOS ALEATORIOS (FACTORY)
        // ==========================================
        $this->crearUsuariosAleatorios(14);

        // ==========================================
        // RESUMEN EN CONSOLA
        // ==========================================
        $this->mostrarResumen();
    }

    /**
     * Crear usuarios aleatorios con Factory
     */
    private function crearUsuariosAleatorios(int $cantidad): void
    {
        for ($i = 1; $i <= $cantidad; $i++) {
            $user = User::factory()->create();
            
            if ($user->role === 'professional') {
                $user->professional()->create([
                    'specialty' => fake()->randomElement(['psicologia', 'psiquiatria', 'terapeuta']),
                    'license_number' => fake()->randomElement(['PSI', 'PSQ', 'TER']) . fake()->numerify('####'),
                    'about' => fake()->paragraph(),
                    'is_active' => true,
                ]);
            }
        }
    }

    /**
     * Mostrar resumen en consola
     */
    private function mostrarResumen(): void
    {
        $totalUsuarios = User::count();
        
        $this->command->info('');
        $this->command->info('════════════════════════════════════════════════');
        $this->command->info('      UserSeeder completado exitosamente        ');
        $this->command->info('════════════════════════════════════════════════');
        $this->command->info("Total de usuarios creados: {$totalUsuarios}");
        $this->command->info('   • 6 usuarios específicos');
        $this->command->info('   • 14 usuarios aleatorios');
        $this->command->info('');
        $this->command->warn('Credenciales de prueba:');
        $this->command->warn('');
        $this->command->line('   👤 Admin (Terapeuta):');
        $this->command->line('      Email: admin@clinmind.com');
        $this->command->line('      Pass:  Password1!');
        $this->command->line('');
        $this->command->line('   👤 Psicólogo:');
        $this->command->line('      Email: psicologo@clinmind.com');
        $this->command->line('      Pass:  Password1!');
        $this->command->line('');
        $this->command->line('   👤 Extranjera (Psicóloga):');
        $this->command->line('      Email: extranjera@clinmind.com');
        $this->command->line('      Pass:  Password1!');
        $this->command->line('');
        $this->command->line('   👤 Psiquiatra:');
        $this->command->line('      Email: psiquiatra@clinmind.com');
        $this->command->line('      Pass:  Password1!');
        $this->command->line('');
        $this->command->line('   👤 Terapeuta Senior:');
        $this->command->line('      Email: terapeuta@clinmind.com');
        $this->command->line('      Pass:  Password1!');
        $this->command->info('');
        $this->command->info('════════════════════════════════════════════════');
    }
}