<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los IDs de cada uno de los estados
        $tachiraId = State::where('name', 'Táchira')->first()->id;
        $meridaId = State::where('name', 'Mérida')->first()->id;
        $zuliaId = State::where('name', 'Zulia')->first()->id;

        $antioquiaId = State::where('name', 'Antioquia')->first()->id;
        $cundinamarcaId = State::where('name', 'Cundinamarca')->first()->id;
        $valleDelCaucaId = State::where('name', 'Valle del Cauca')->first()->id;

        $cdmxId = State::where('name', 'Ciudad de México')->first()->id;
        $jaliscoId = State::where('name', 'Jalisco')->first()->id;
        $nuevoLeonId = State::where('name', 'Nuevo León')->first()->id;

        $now = now();

        DB::table('cities')->insert([
            // Ciudades para Táchira (Venezuela)
            ['name' => 'San Cristóbal', 'state_id' => $tachiraId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Táriba', 'state_id' => $tachiraId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rubio', 'state_id' => $tachiraId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Mérida (Venezuela)
            ['name' => 'Mérida', 'state_id' => $meridaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ejido', 'state_id' => $meridaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'El Vigía', 'state_id' => $meridaId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Zulia (Venezuela)
            ['name' => 'Maracaibo', 'state_id' => $zuliaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cabimas', 'state_id' => $zuliaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Ciudad Ojeda', 'state_id' => $zuliaId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Antioquia (Colombia)
            ['name' => 'Medellín', 'state_id' => $antioquiaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Envigado', 'state_id' => $antioquiaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Itagüí', 'state_id' => $antioquiaId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Cundinamarca (Colombia)
            ['name' => 'Bogotá', 'state_id' => $cundinamarcaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chía', 'state_id' => $cundinamarcaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zipaquirá', 'state_id' => $cundinamarcaId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Valle del Cauca (Colombia)
            ['name' => 'Cali', 'state_id' => $valleDelCaucaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Palmira', 'state_id' => $valleDelCaucaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Buga', 'state_id' => $valleDelCaucaId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Ciudad de México (México)
            ['name' => 'Ciudad de México', 'state_id' => $cdmxId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Coyoacán', 'state_id' => $cdmxId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Benito Juárez', 'state_id' => $cdmxId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Jalisco (México)
            ['name' => 'Guadalajara', 'state_id' => $jaliscoId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zapopan', 'state_id' => $jaliscoId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tlaquepaque', 'state_id' => $jaliscoId, 'created_at' => $now, 'updated_at' => $now],

            // Ciudades para Nuevo León (México)
            ['name' => 'Monterrey', 'state_id' => $nuevoLeonId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'San Nicolás de los Garza', 'state_id' => $nuevoLeonId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Guadalupe', 'state_id' => $nuevoLeonId, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
