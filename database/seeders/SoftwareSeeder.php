<?php

namespace Database\Seeders;

use App\Models\Software;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('software')->truncate();

        for ($i = 0; $i < 10; $i++) {
            Software::create([
                'name' => 'Antivirus',
                'system_operative' => 'Windows',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 5,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            Software::create([
                'name' => 'Antivirus',
                'system_operative' => 'Mac',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 7,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            Software::create([
                'name' => 'Ofimática',
                'system_operative' => 'Windows',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 10,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            Software::create([
                'name' => 'Ofimática',
                'system_operative' => 'Mac',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 12,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }

        for ($i = 0; $i < 30; $i++) {
            Software::create([
                'name' => 'Editor de video',
                'system_operative' => 'Windows',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 20,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }

        for ($i = 0; $i < 30; $i++) {
            Software::create([
                'name' => 'Editor de video',
                'system_operative' => 'Mac',
                'stock' => 1,
                'license' => Str::random(100),
                'sku' => Str::random(10),
                'price' => 22,
                'status' => 'A',
                'created_by' => 'Seeder',
            ]);
        }
    }
}
