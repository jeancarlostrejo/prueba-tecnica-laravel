<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener los IDs de los países para relacionar los estados
        $venezuelaId = Country::where('name', 'Venezuela')->first()->id;
        $colombiaId = Country::where('name', 'Colombia')->first()->id;
        $mexicoId = Country::where('name', 'México')->first()->id;

        $now = now();

        DB::table('states')->insert([
            // Estados para Venezuela
            ['name' => 'Táchira', 'country_id' => $venezuelaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mérida', 'country_id' => $venezuelaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zulia', 'country_id' => $venezuelaId, 'created_at' => $now, 'updated_at' => $now],

            // Estados para Colombia
            ['name' => 'Antioquia', 'country_id' => $colombiaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cundinamarca', 'country_id' => $colombiaId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Valle del Cauca', 'country_id' => $colombiaId, 'created_at' => $now, 'updated_at' => $now],
            
            // Estados para México
            ['name' => 'Ciudad de México', 'country_id' => $mexicoId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Jalisco', 'country_id' => $mexicoId, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nuevo León', 'country_id' => $mexicoId, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
