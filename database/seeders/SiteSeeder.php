<?php

namespace Database\Seeders;

use App\Helpers\Helper;
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
        // hpac 1 :  6f8tblqkhj4rx
        $sheetdb = new SheetDB('6f8tblqkhj4rx');

        $data = @json_decode(json_encode($sheetdb->get()), true);


        $sites = collect($data);

        foreach($sites as $site){
            $site_region_location = Helper::stringToNumeric($site['site_monthly_traffic']);
            Site::create([
                'user_id'   => 1,
                'site_name' => $site['site_name'],
                'site_url' => $site['site_url'],
                'site_category' => $site['site_category'],
                'site_price' => $site['site_price'],
                'site_region_location' => $site['site_region_location'],
                'site_monthly_traffic' => $site_region_location,
                'site_language' => $site['language'],

                'site_domain_authority' => $site['site_domain_authority'],
                'site_domain_rating' => $site['site_domain_rating'],
                'site_sposored' => $site['site_sposored'],
                'site_indexed' => $site['site_indexed'],

                'site_dofollow' => $site['site_dofollow'],
                'site_images' => 'No',
                'site_time' => $site['site_time'],
                'spam_score' => $site['spam_score'] ?? '-',
                'word_limite' =>  0,
            ]);
        }

      //****************************************************************//

      //**********************  2  ********************************//
        // hpac 2 :  dm4nilawm5vy2
        $sheetdb2 = new SheetDB('dm4nilawm5vy2');

        $data2 = @json_decode(json_encode($sheetdb2->get()), true);


        $sites2 = collect($data2);


        foreach($sites2 as $site2){
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
                'site_images' => 'No',
                'site_time' => $site['site_time'],
                'spam_score' => $site['spam_score'] ?? '-',
                'word_limite' =>  0,
            ]);
        }

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
