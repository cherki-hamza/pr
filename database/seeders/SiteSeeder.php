<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use SheetDB\SheetDB;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sheetdb = new SheetDB('btvs8e6ku3z5m');

        $data = @json_decode(json_encode($sheetdb->get()), true);


        $sites = collect($data);

        //return $sites[0]['site_name'];

        foreach($sites as $site){
            Site::create([
                'user_id'   => 1,
                'site_name' => $site['site_name'],
                'site_url' => $site['site_url'],
                'site_category' => $site['site_category'],
                'site_price' => $site['site_price'],
                'site_region_location' => $site['site_region_location'],

                'site_domain_authority' => $site['site_domain_authority'],
                'site_domain_rating' => $site['site_domain_rating'],
                'site_sposored' => $site['site_sposored'],
                'site_indexed' => $site['site_indexed'],

                'site_dofollow' => $site['site_dofollow'],
                'site_images' => $site['site_images'],
                'site_time' => $site['site_time'],
            ]);
        }

    }
}
