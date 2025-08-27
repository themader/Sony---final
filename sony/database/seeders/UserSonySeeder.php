<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users_sony')->insert([
            [
                'id' => 1,
                'google_id' => null,
                'name' => 'Franco Russo',
                'role' => 'Admin',
                'email' => 'franco.russo@sony.com.ar',
                'password' => Hash::make('russo03'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'google_id' => null,
                'name' => 'Sara Martinez',
                'role' => 'Empleado',
                'email' => 'sara.martinez@sony.com.ar',
                'password' => Hash::make('martinez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'google_id' => null,
                'name' => 'Luis Gómez',
                'role' => 'Soporte',
                'email' => 'luis.gomez@sony.com.ar',
                'password' => Hash::make('gomez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'google_id' => null,
                'name' => 'Natalia Fernández',
                'role' => 'Empleado',
                'email' => 'natalia.fernandez@sony.com.ar',
                'password' => Hash::make('fernandez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'google_id' => null,
                'name' => 'Tomás Pérez',
                'role' => 'Admin',
                'email' => 'tomas.perez@sony.com.ar',
                'password' => Hash::make('perez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'google_id' => null,
                'name' => 'Verónica Lopez',
                'role' => 'Empleado',
                'email' => 'veronica.lopez@sony.com.ar',
                'password' => Hash::make('lopez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'google_id' => null,
                'name' => 'Carlos Ramírez',
                'role' => 'Empleado',
                'email' => 'carlos.ramirez@sony.com.ar',
                'password' => Hash::make('ramirez'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
