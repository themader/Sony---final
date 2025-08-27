<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'name' => 'Videojuegos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Consola',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Accesorio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PlayStation 5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PlayStation 4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Auriculares',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Controles',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'VR (Realidad Virtual)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PlayStation Plus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ediciones Especiales',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('producto_have_categorias')->insert([
            ['producto_id' => 1, 'categoria_fk' => 1],
            ['producto_id' => 2, 'categoria_fk' => 1],
            ['producto_id' => 3, 'categoria_fk' => 2],
            ['producto_id' => 3, 'categoria_fk' => 4],
            ['producto_id' => 4, 'categoria_fk' => 3],
            ['producto_id' => 4, 'categoria_fk' => 7],
            ['producto_id' => 5, 'categoria_fk' => 1],
            ['producto_id' => 6, 'categoria_fk' => 1],
            ['producto_id' => 7, 'categoria_fk' => 3],
            ['producto_id' => 7, 'categoria_fk' => 8],
            ['producto_id' => 8, 'categoria_fk' => 1],
            ['producto_id' => 9, 'categoria_fk' => 1],
            ['producto_id' => 10, 'categoria_fk' => 1],
            ['producto_id' => 11, 'categoria_fk' => 1],
            ['producto_id' => 12, 'categoria_fk' => 2],
            ['producto_id' => 12, 'categoria_fk' => 5],
            ['producto_id' => 13, 'categoria_fk' => 3],
            ['producto_id' => 13, 'categoria_fk' => 6],
            ['producto_id' => 14, 'categoria_fk' => 1],
            ['producto_id' => 15, 'categoria_fk' => 1],
            ['producto_id' => 16, 'categoria_fk' => 3],
            ['producto_id' => 17, 'categoria_fk' => 1],
            ['producto_id' => 18, 'categoria_fk' => 3],
        ]);


    }
}
