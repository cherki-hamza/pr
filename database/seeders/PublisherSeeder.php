<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $sites = [
           [ 'user_id' => 1,
             'site_name' =>  'dev 1',
             'site_url' =>  'https://dev1.com',
             'site_category' =>  'category 1',
             'site_domain_rating' =>  50,
            'site_domain_authority' =>  60,
            'site_price' =>  500,
            'site_time' => '1-3 Days',
            'site_sposored' =>  'N',
            'site_indexed' =>  'Y',
            'site_dofollow' =>  'y',
            'site_region_location' =>  'us'
           ],
           [ 'user_id' => 2,
           'site_name' =>  'dev 2',
           'site_url' =>  'https://dev2.com',
           'site_category' =>  'category 2',
           'site_domain_rating' =>  50,
          'site_domain_authority' =>  60,
          'site_price' =>  400,
          'site_time' => '1-3 Days',
          'site_sposored' =>  'N',
          'site_indexed' =>  'Y',
          'site_dofollow' =>  'y',
          'site_region_location' =>  'us'
         ],
         [ 'user_id' => 3,
             'site_name' =>  'dev 3',
             'site_url' =>  'https://dev3.com',
             'site_category' =>  'category 3',
             'site_domain_rating' =>  50,
            'site_domain_authority' =>  60,
            'site_price' =>  200,
            'site_time' => '1-3 Days',
            'site_sposored' =>  'N',
            'site_indexed' =>  'Y',
            'site_dofollow' =>  'y',
            'site_region_location' =>  'us'
           ],
           [ 'user_id' => 1,
             'site_name' =>  'dev 1',
             'site_url' =>  'https://dev1.com',
             'site_category' =>  'category 1',
             'site_domain_rating' =>  50,
            'site_domain_authority' =>  60,
            'site_price' =>  500,
            'site_time' => '1-3 Days',
            'site_sposored' =>  'N',
            'site_indexed' =>  'Y',
            'site_dofollow' =>  'y',
            'site_region_location' =>  'us'
           ],

        ];


    }
}
