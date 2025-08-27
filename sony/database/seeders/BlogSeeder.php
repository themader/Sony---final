<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog')->insert([
            [
                'cover' => 'covers/mrfbWjLPFYR0d8SYr8kpS4jT6ctoQdhsp9XEyHFi.webp',
                'titulo' => 'Resident evil esta devuelta en el 2026',
                'texto' => 'Capcom anuncia RESIDENT EVIL ): REQUIEM que volverá con una nueva historia ambientada en 2026.',
                'created_at' => '2025-07-05 22:41:09',
                'updated_at' => '2025-07-05 22:41:09',
            ],
            [
                'cover' => 'covers/suzlxda0B23mzCltMz6dKsJtrjxiLkViWKxDH5mn.jpg',
                'titulo' => 'Acerca de SONY',
                'texto' => 'En SONY, nos apasiona la innovación, la tecnología y ofrecer experiencias que inspiran a los consumidores de todo el mundo.',
                'created_at' => '2025-07-07 04:24:15',
                'updated_at' => '2025-07-07 04:24:15',
            ],
            [
                'cover' => 'covers/8PLLGc1jdNOqdld732GySKMC6gIzzwAoWaVIjNo2.webp',
                'titulo' => 'Acuerdo con Granft Theft Auto 6',
                'texto' => 'Sony y Rockstar Games (Take Two) llegaron a un acuerdo exclusivo para la distribución de GTA 6 en consolas PlayStation durante el primer año.',
                'created_at' => '2025-07-07 04:34:33',
                'updated_at' => '2025-07-07 04:34:33',
            ],
            [
                'cover' => 'covers/0boSqy0rLb57txSG74DF6QazGYqIKfZsJYVZivUL.webp',
                'titulo' => 'Playstation 5',
                'texto' => 'Sony desarrolló la Playstation 5 PRO con mejor gráfica, más almacenamiento y retrocompatibilidad completa.',
                'created_at' => '2025-07-07 04:35:03',
                'updated_at' => '2025-07-07 04:35:03',
            ],
        ]);
    }
}

