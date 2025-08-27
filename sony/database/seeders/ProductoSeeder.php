<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('producto')->insert([
            [   
                'nombre' => 'Grand Theft Auto V',
                'empresa' => 'Rockstar Games',
                'price' => 2500,
                'date_lanzamiento' => '2013-09-30',
                'description' => 'Grand Theft Auto V es un videojuego de acción-aventura ambientado en la ciudad ficticia de Los Santos',
                'cover' => 'covers/Xr8vBMTgBUnxZwCkaqIac7lQBXKHCF9K5PPvBCYi.jpg', 
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'nombre' => 'Red Dead Redemption 2',
                'empresa' => 'Rockstar Games',
                'price' => 7500,
                'date_lanzamiento' => '2018-10-26',
                'description' => 'Red Dead Redemption 2 es una epopeya del Viejo Oeste que ofrece una experiencia narrativa profundamente emocional',
                'cover' => 'covers/TfRZylsnNUsDJQfzFE2zdeJizgRfwEfpvoIFvjQm.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'nombre' => 'PlayStation 5 Standard',
                'empresa' => 'Sony',
                'price' => 50000,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'La PlayStation 5 ofrece una experiencia de juego revolucionaria',
                'cover' => 'covers/0D8H4WAFvLrXNxcHpEApXUSW1k3cnoHF5ahRoaCk.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'nombre' => 'DualSense Wireless Controller',
                'empresa' => 'Sony',
                'price' => 8500,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'El DualSense revoluciona la forma en que sentimos los videojuegos',
                'cover' => 'covers/RmmMEl4EsoT4npdX7Qu6nNuga1GEdXLO3numevZb.webp',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Horizon Forbidden West',
                'empresa' => 'Sony',
                'price' => 9000,
                'date_lanzamiento' => '2022-02-18',
                'description' => 'Horizon Forbidden West es la secuela de Horizon Zero Dawn',
                'cover' => 'covers/ST3P4feXNReUcXx36c2SsSLsPs3ure5AfKKiqVma.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'The Last of Us Part II',
                'empresa' => 'Sony',
                'price' => 8000,
                'date_lanzamiento' => '2020-06-19',
                'description' => 'En The Last of Us Part II, los jugadores experimentan una historia intensa',
                'cover' => 'covers/ZlV6Qfq3AJ8yfzSPN6q4H3DMUtMxQ8ADsbK500VB.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'PlayStation VR2',
                'empresa' => 'Sony',
                'price' => 45000,
                'date_lanzamiento' => '2023-02-22',
                'description' => 'El visor PlayStation VR2 redefine la realidad virtual en consolas',
                'cover' => 'covers/ukOHxdYc9zWaTa02cwOOAqrK2n4mlkVGb1lolHnm.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'nombre' => 'God of War Ragnarök',
                'empresa' => 'Sony',
                'price' => 9500,
                'date_lanzamiento' => '2022-11-09',
                'description' => 'God of War Ragnarök continúa la historia de Kratos y Atreus',
                'cover' => 'covers/1qjMW4Fx4XiedscncMhM2Dj8Lno7GrTnMdWN0jUr.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Spider-Man: Miles Morales',
                'empresa' => 'Sony',
                'price' => 7500,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'En Spider-Man: Miles Morales, tomás el control del joven superhéroe',
                'cover' => 'covers/sZ1dXeH32BSmfDcafSlQZbDK0JgziTDBZRVnm0VO.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Ratchet & Clank: Rift Apart',
                'empresa' => 'Sony',
                'price' => 8800,
                'date_lanzamiento' => '2021-06-11',
                'description' => 'Ratchet & Clank: Rift Apart es una espectacular aventura de plataformas',
                'cover' => 'covers/xfkKpizmOF507NQzDUPznETmlJfPmQcUnODszSdU.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Uncharted 4: A Thief’s End',
                'empresa' => 'Naughty Dog',
                'price' => 7200,
                'date_lanzamiento' => '2016-05-10',
                'description' => 'Uncharted 4 sigue las aventuras de Nathan Drake.',
                'cover' => 'covers/9C4W1BtQa0T6mHUqTCnQvdoqqOdmZCrLddNCnM9j.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'PlayStation 4 Pro',
                'empresa' => 'Sony',
                'price' => 35000,
                'date_lanzamiento' => '2016-11-10',
                'description' => 'La PS4 Pro es una versión mejorada de la PlayStation 4.',
                'cover' => 'covers/TW23jMtqhzuQodceVK4Q9MrZ9E3zSCniGEKOb1BB.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [
                'nombre' => 'Pulse 3D Wireless Headset',
                'empresa' => 'Sony',
                'price' => 12500,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'Auriculares inalámbricos diseñados especialmente para PS5.',
                'cover' => 'covers/K2GTGFxnWxCaySmjUHQgZ6R59rf840SARgIy2wIJ.webp',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Ghost of Tsushima',
                'empresa' => 'Sucker Punch Productions',
                'price' => 7800,
                'date_lanzamiento' => '2020-07-17',
                'description' => 'Ambientado en el Japón feudal, seguís a Jin Sakai.',
                'cover' => 'covers/1tE2zfvAXwg16haGBpB2HCskjtqjz2QBCMY4vnqR.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Gran Turismo 7',
                'empresa' => 'Polyphony Digital',
                'price' => 9000,
                'date_lanzamiento' => '2022-03-04',
                'description' => 'Gran Turismo 7 es un simulador de carreras con una enorme variedad.',
                'cover' => 'covers/GCOtuLv4MDyWsbs2YQyW0u0Hc7bjMCIqOxanFLFj.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Media Remote PS5',
                'empresa' => 'Sony',
                'price' => 3500,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'Control remoto para PS5 que permite navegar por servicios multimedia como Netflix, YouTube y Disney+. Diseño minimalista, acceso rápido a contenido y controles intuitivos.',
                'cover' => 'covers/eCdx7Pnco6o1213nB5jOSKVguxW5Hd1G7N8ggGv8.jpg',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'Sackboy: A Big Adventure',
                'empresa' => 'Sumo Digital',
                'price' => 7400,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'Juego de plataformas protagonizado por Sackboy, el adorable personaje de LittleBigPlanet. Aventura cooperativa o individual, con mundos coloridos y retos creativos pensados para todas las edades.',
                'cover' => 'covers/1aYfgWAZgbB8AI4Ys67qwME7jeaBwFRMIxEPJftF.avif',
                'updated_at' => now(),
                'created_at' => now()
            ],
            [   
                'nombre' => 'PS5 Charging Station',
                'empresa' => 'Sony',
                'price' => 4200,
                'date_lanzamiento' => '2020-11-12',
                'description' => 'Estación de carga oficial para dos controles DualSense simultáneamente, sin necesidad de conectarlos directamente a la consola. Diseño elegante y práctico para mantener todo organizado.',
                'cover' => 'covers/Fa9hv0AA9a23VTNJkgwZzElsN0GLeQLa8QVz5lvx.webp',
                'updated_at' => now(),
                'created_at' => now()
            ],
        ]);
    }
}
