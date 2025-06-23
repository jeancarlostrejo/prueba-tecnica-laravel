<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('countries')->insert([
            ['name' => 'Venezuela', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Colombia', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'México', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
