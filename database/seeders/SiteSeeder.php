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

        //**********************  1 ********************************//
        // hpac 1 :  hzup0f5v2ttx8
        $sheetdb = new SheetDB('oof2kdurjyzhx');

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
                'site_monthly_traffic' => $site['site_monthly_traffic'],
                'site_language' => $site['language'],

                'site_domain_authority' => $site['site_domain_authority'],
                'site_domain_rating' => $site['site_domain_rating'],
                'site_sposored' => $site['site_sposored'],
                'site_indexed' => $site['site_indexed'],

                'site_dofollow' => $site['site_dofollow'],
                'site_images' => $site['site_images'],
                'site_time' => $site['site_time'],
                'spam_score' => $site['spam_score'] ?? 1,
                'site_price2' => $site['site_price2'],
                'word_limite' =>  $site['word_limite'],
            ]);
        }

      //****************************************************************//

      //**********************  2  ********************************//
        // hpac 2 :  tqrbuhd4u5rud
       /*  $sheetdb2 = new SheetDB('tqrbuhd4u5rud');

        $data2 = @json_decode(json_encode($sheetdb2->get()), true);


        $sites2 = collect($data2);

        //return $sites[0]['site_name'];

        foreach($sites2 as $site2){
            Site::create([
                'user_id'   => 1,
                'site_name' => $site2['site_name'],
                'site_url' => $site2['site_url'],
                'site_category' => $site2['site_category'],
                'site_price' => $site2['site_price'],
                'site_region_location' => $site2['site_region_location'],
                'site_monthly_traffic' => $site2['site_monthly_traffic'],

                'site_domain_authority' => $site2['site_domain_authority'],
                'site_domain_rating' => $site2['site_domain_rating'],
                'site_sposored' => $site2['site_sposored'],
                'site_indexed' => $site2['site_indexed'],

                'site_dofollow' => $site2['site_dofollow'],
                'site_images' => $site2['site_images'],
                'site_time' => $site2['site_time'],
                'spam_score' => $site['spam_score'] ?? '-',
            ]);
        } */

      //****************************************************************//


        //**********************  3  ********************************//
        // hpac 3 :  84t4a75u6u25w
       /*  $sheetdb3 = new SheetDB('84t4a75u6u25w');

        $data3 = @json_decode(json_encode($sheetdb3->get()), true);


        $sites3 = collect($data3);

        //return $sites[0]['site_name'];

        foreach($sites3 as $site3){
            Site::create([
                'user_id'   => 1,
                'site_name' => $site3['site_name'],
                'site_url' => $site3['site_url'],
                'site_category' => $site3['site_category'],
                'site_price' => $site3['site_price'],
                'site_region_location' => $site3['site_region_location'],
                'site_monthly_traffic' => $site3['site_monthly_traffic'],

                'site_domain_authority' => $site3['site_domain_authority'],
                'site_domain_rating' => $site3['site_domain_rating'],
                'site_sposored' => $site3['site_sposored'],
                'site_indexed' => $site3['site_indexed'],

                'site_dofollow' => $site3['site_dofollow'],
                'site_images' => $site3['site_images'],
                'site_time' => $site3['site_time'],
                'spam_score' => $site['spam_score'] ?? '-',
            ]);
        } */

      //****************************************************************//


    }
}
