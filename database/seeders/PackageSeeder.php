<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'package_offre' => '500-700',
            'package_price' => 250
        ]);

        Package::create([
            'package_offre' => '700-1000',
            'package_price' => 350
        ]);

        Package::create([
            'package_offre' => '1000-1300',
            'package_price' => 400
        ]);
    }
}
