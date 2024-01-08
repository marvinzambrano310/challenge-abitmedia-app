<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->truncate();

        Services::create([
            'name' => 'Formateo de computadores',
            'sku' => Str::random(10),
            'price' => 25,
            'status' => 'A',
            'created_by' => 'Seeder',
        ]);

        Services::create([
            'name' => 'Mantenimiento',
            'sku' => Str::random(10),
            'price' => 30,
            'status' => 'A',
            'created_by' => 'Seeder',
        ]);

        Services::create([
            'name' => 'Hora de soporte en software',
            'sku' => Str::random(10),
            'price' => 50,
            'status' => 'A',
            'created_by' => 'Seeder',
        ]);
    }
}
