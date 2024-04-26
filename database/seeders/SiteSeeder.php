<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $category_array = array("News", "Music", "Real Estate", "Entertainment", "Lifestlye", "Business","Luxury","web 3" ,"Tech","Crypto");
        $time_array = [$faker->numberBetween(1,3), $faker->numberBetween(3,5)];
        $rand_yes_no = ['Y','N','Y','Y','N','Y'];

        $locations = `
        LOS ANGELES
        LOS ANGELES
        GLOBAL
        NEW YORK
        GLOBAL
        MIAMI
        GLOBAL
        UNITED STATES
        CALIFORNIA
        GLOBAL
        NEW YORK
        GLOBAL
        GLOBAL
        GEORGIA
        UNITED STATES
        CALIFORNIA
        ILLINOIS
        GLOBAL
        OREGON
        GLOBAL
        GLOBAL
        GLOBAL
        NEW YORK
        GLOBAL
        LOS ANGELES
        GLOBAL
        NEW YORK
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        NEW YORK
        GLOBAL
        GLOBAL
        CALIFORNIA
        CALIFORNIA
        CALIFORNIA
        GLOBAL
        FLORIDA
        UNITED STATES
        TEXAS
        UNITED STATES
        UNITED STATES
        MIDDLE EAST
        GLOBAL
        GLOBAL
        CALIFORNIA
        GLOBAL
        CALIFORNIA
        GLOBAL
        GLOBAL
        UNITED STATES
        GLOBAL
        GLOBAL
        UNITED KINGDOM
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED KINGDOM
        GLOBAL
        GLOBAL
        GLOBAL
        UNITED KINGDOM
        UNITED STATES
        GLOBAL
        EUROPE
        CHINA
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        EUROPE
        UNITED STATES
        UNITED STATES
        GLOBAL
        EUROPE
        GLOBAL
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        GLOBAL
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        LOS ANGELES
        UNITED STATES
        UNITED STATES
        GLOBAL
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        GLOBAL
        UNITED STATES
        CALIFORNIA
        CALIFORNIA
        UNITED STATES
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        ASIA PACIFIC
        GLOBAL
        GLOBAL
        UNITED STATES
        GLOBAL
        GLOBAL
        AFRICA
        AUSTRALIA
        UNITED STATES
        UNITED STATES
        UNITED KINGDOM
        AFRICA
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        PHILADELPHIA
        WASHINGTON DC
        CALIFORNIA
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UAE
        GLOBAL
        LATIN AMERICA
        CALIFORNIA
        CALIFORNIA
        ARGENTINA
        CALIFORNIA
        CALIFORNIA
        CALIFORNIA
        GLOBAL
        CALIFORNIA
        GLOBAL
        GLOBAL
        CALIFORNIA
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        GLOBAL
        UNITED STATES
        GLOBAL
        UNITED STATES
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        UNITED STATES
        INDIA
        DELAWARE
        WISCONSIN
        WISCONSIN
        WISCONSIN
        WISCONSIN
        MINNESOTA
        VERMONT
        WISCONSIN
        VIRGINIA
        COLORADO
        ARIZONA
        MINNESOTA
        NEW MEXICO
        VERMONT
        VERMONT
        COLORADO
        ARIZONA
        WISCONSIN
        WISCONSIN
        WISCONSIN
        COLORADO
        VERMONT
        AFRICA
        GLOBAL
        GLOBAL
        IRVINE
        CALIFORNIA
        CALIFORNIA
        GLOBAL
        GLOBAL
        UNITED STATES
        GLOBAL
        GLOBAL
        SOUTH AFRICA
        LOS ANGELES
        CALIFORNIA
        CALIFORNIA
        GLOBAL
        NEW YORK
        PENNSYLVANIA
        VIRGINIA
        CONNECTICUT
        FLORIDA
        FLORIDA
        MARYLAND
        NEW YORK
        ILLINOIS
        GLOBAL
        GLOBAL
        GLOBAL
        GLOBAL
        WISCONSIN
        MINNESOTA
        CALIFORNIA
        TEXAS
        UNITED STATES
        UNITED STATES
        CALIFORNIA
        UNITED KINGDOM
        GLOBAL
        EUROPE
        TEXAS
        GLOBAL
        DENVER
        MIAMI
        GLOBAL
        GLOBAL
        GLOBAL
        CALIFORNIA
        GLOBAL
        LOS ANGELES
        AFRICA
        GLOBAL
        GLOBAL
        CALIFORNIA
        GLOBAL
        GLOBAL
        FLORIDA
        MIAMI
        ARIZONA
        WASHINGTON
        PHILIPPINES
        WASHINGTON
        JERUSALEM
        COLORADO
        ILLINOIS
        ARIZONA
        TEXAS
        TEXAS
        CALIFORNIA
        FLORIDA
        GEORGIA
        GEORGIA
        WASHINGTON STATE
        LOS ANGELES
        CALIFORNIA
        NEW YORK
        ARIZONA
        SAN FRANCISCO
        MIAMI
        NEW YORK
        COLORADO
        COLORADO
        NEW YORK
        GLOBAL
        GLOBAL
        UAE
        JAPAN
        TEXAS
        WYOMING
        NEBRASKA
        VIRGINIA
        VIRGINIA
        IOWA
        VIRGINIA
        WISCONSIN
        VIRGINIA
        NOTH CAROLINA
        NEBRASKA
        MONTANA
        VIRGINIA
        UNITED STATES
        TEXAS
        FLORIDA
        FLORIDA
        OHIO
        MISSOURI
        MICHIGAN
        DALLAS
        GLOBAL
        GLOBAL
        GLOBAL
        NEBRASKA
        GLOBAL
        NORTH CAROLINA
        GLOBAL
        GLOBAL
        NEW JERSEY
        NORTH CAROLINA
        NEBRASKA
        NORTH CAROLINA
        GLOBAL
        ILLINOIS
        NEBRASKA
        VIRGINIA
        WISCONSIN
        NORTH CAROLINA
        NEBRASKA
        IOWA
        NORTH CAROLINA
        NEBRASKA
        OREGON
        GLOBAL
        NEBRASKA
        MINNESOTA
        NEVEDA
        PENNSYLVANIA
        SOUTH CAROLINA
        WASHINGTON D.C.
        IOWA
        ILLINOIS
        ALABAMA
        OREGON
        ILLINOIS
        NEBRASKA
        AUSTRALIA
        SOUTH CAROLINA
        VIRGINIA
        IDAHO
        NEW YORK
        MONTANA
        NEW YORK
        WISCONSIN
        VIRGINIA
        WISCONSIN
        ILLINOIS
        VIRGINIA
        NORTH DAKOTA
        IOWA
        WYOMING
        DUBAI
        GLOBAL
        LOS ANGELES
        CALIFORNIA
        ARIZONA
        NEBRASKA
        ALABAMA
        IOWA
        TEXAS
        WISCONSIN
        MONTANA
        IOWA
        TEXAS
        SOUTH DAKOTA
        IOWA
        VIRGINIA
        NORTH CAROLINA
        MONTANA
        NEW JERSEY
        NORTH CAROLINA
        MONTANA
        VIRGINIA
        INDIANA
        NEBRASKA
        OKLAHOMA
        NEBRASKA
        NEW YORK
        CALIFORNIA
        VIRGINIA
        MISSOURI
        NETHERLANDS
        UKRAINE
        GLOBAL
        GLOBAL
        GLOBAL
        NEW YORK
        NETHERLANDS
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED KINGDOM
        LOS ANGELES
        UNITED KINGDOM
        CALIFORNIA
        UNITED KINGDOM
        UNITED KINGDOM
        WASHINGTON
        GLOBAL
        GLOBAL
        GLOBAL
        AUSTRALIA
        AFRICA
        GLOBAL
        MICHIGAN
        INDIANA
        ILLINOIS
        ILLINOIS
        ILLINOIS
        INDIANA
        ILLINOIS
        PENNSYLVANIA
        CALIFORNIA
        ILLINOIS
        PENNSYLVANIA
        MASSACHUSETTS
        MICHIGAN
        UNITED STATES
        GLOBAL
        MICHIGAN
        NEW YORK
        OHIO
        OHIO
        OHIO
        NEW YORK
        WISCONSIN
        KENTUCKY
        OHIO
        MEXICO
        MICHIGAN
        NEW MEXICO
        ILLINOIS
        FLORIDA
        LOUISIANA
        SOUTH DAKOTA
        PENNSYLVANIA
        NEW YORK
        ILLINOIS
        INDIANA
        TENNESSEE
        OHIO
        OKLAHOMA
        WISCONSIN
        LOUISIANA
        GLOBAL
        WISCONSIN
        OHIO
        KANSAS
        OHIO
        PENNSYLVANIA
        MICHIGAN
        OHIO
        OHIO
        ILLINOIS
        NEW YORK
        OHIO
        NEW MEXICO
        VIRGINIA
        WISCONSIN
        GLOBAL
        ALABAMA
        GLOBAL
        GLOBAL
        GLOBAL
        INDIA
        RHODE ISLAND
        GLOBAL
        UNITED STATES
        LOUISIANA
        UNITED STATES
        COLORADO
        GLOBAL
        GLOBAL
        GLOBAL
        UNITED STATES
        GLOBAL
        COLORADO
        AUSTRALIA
        FLORIDA
        OHIO
        OHIO
        OHIO
        OHIO
        SOUTH CAROLINA
        LOS ANGELES
        NETHERLANDS
        AUSTRALIA
        AUSTRALIA
        AUSTRALIA
        AUSTRALIA
        AFRICA
        AFRICA
        COLUMBIA
        MEXICO
        ISREAL
        INDIA
        GLOBAL
        UAE
        UNITED STATES
        LATIN AMERICA
        GLOBAL
        GLOBAL
        MEXICO
        MEXICO
        NORTH CAROLINA
        PENNSYLVANIA
        NEW MEXICO
        PENNSYLVANIA
        OHIO
        WISCONSIN
        PENNSYLVANIA
        CANADA
        WISCONSIN
        NEW JERSEY
        MICHIGAN
        MASSACHUSETTS
        LOUISIANA
        WISCONSIN
        NEW JERSEY
        TENNESSEE
        MICHIGAN
        MASSACHUSETTS
        NEW YORK
        MISSISSIPPI
        FLORIDA
        NEW YORK
        MICHIGAN
        TENNESSEE
        NEW YORK
        KANSAS
        TENNESSEE
        OHIO
        IOWA
        TEXAS
        INDIANA
        LOUISIANA
        VIRGINIA
        TENNESSEE
        MICHIGAN
        INDIANA
        CALIFORNIA
        NORTH CAROLINA
        TEXAS
        MICHIGAN
        PENNSYLVANIA
        ARKANSAS
        LOUISIANA
        UTAH
        CONNECTICUT
        TEXAS
        NEW JERSEY
        CALIFORNIA
        MICHIGAN
        NEW YORK
        TEXAS
        CONNECTICUT
        IOWA
        FLORIDA
        COLORADO
        MASSACHUSETTS
        NEW MEXICO
        ILLINOIS
        NEW JERSEY
        NEW HAMPSHIRE
        FLORIDA
        CALIFORNIA
        ALABAMA
        SOUTH CAROLINA
        FLORIDA
        MINNESOTA
        FLORIDA
        PENNSYLVANIA
        FLORIDA
        ILLINOIS
        SOUTH CAROLINA
        MASSACHUSETTS
        MISSOURI
        GEORGIA
        LOUISIANA
        MARYLAND
        INDIANA
        MASSACHUSETTS
        NEW MEXICO
        WASHINGTON STATE
        MONTANA
        ILLINOIS
        MASSACHUSETTS
        NEW JERSEY
        MASSACHUSETTS
        GEORGIA
        FLORIDA
        NEW YORK
        NORTH CAROLINA
        INDIANA
        ILLINOIS
        CONNECTICUT
        FLORIDA
        NEW YORK
        SOUTH DAKOTA
        OREGON
        CALIFORNIA
        MASSACHUSETTS
        NEW HAMPSHIRE
        GEORGIA
        FLORIDA
        KANSAS
        FLORIDA
        CONNECTICUT
        UNITED STATES
        TEXAS
        SEATTLE
        WISCONSIN
        ARIZONA
        NEW YORK
        GEORGIA
        LOS ANGELES
        HOUSTON
        SAN FRANCISCO
        PENNSYLVANIA
        MICHIGAN
        OHIO
        CANADA
        TEXAS
        SOUTH CAROLINA
        UAE
        FRANCE
        ISRAEL
        MIDDLE EAST
        UNITED STATES
        UNITED STATES
        MEXICO
        UAE
        UAE
        UAE
        UAE
        AUSTRALIA
        CALIFORNIA
        WISCONSIN
        MEXICO
        UAE
        INDIANA
        CALIFORNIA
        WISCONSIN
        UAE
        UAE
        PENNSYLVANIA
        TEXAS
        WISCONSIN
        NORTH CAROLINA
        NEW JERSEY
        COLORADO
        ALABAMA
        VERMONT
        FLORIDA
        PENNSYLVANIA
        OREGON
        NORTH CAROLINA
        FLORIDA
        FLORIDA
        NEVADA
        FLORIDA
        FLORIDA
        TENNESSEE
        MISSISSIPPI
        NEW YORK
        CALIFORNIA
        DELAWARE
        NEW YORK
        TENNESSEE
        ARGENTINA
        RHODE ISLAND
        NEW JERSEY
        FLORIDA
        FLORIDA
        KENTUCKY
        OKLAHOMA
        FLORIDA
        NEW JERSEY
        IOWA
        OHIO
        OHIO
        INDIANA
        TEXAS
        TENNESSEE
        WISCONSIN
        MASSACHUSETTS
        MICHIGAN
        FLORIDA
        ARIZONA
        GLOBAL
        NORDIC
        UNITED STATES
        UNITED KINGDOM
        MEXICO
        OHIO
        OHIO
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        MASSACHUSETTS
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED KINGDOM
        UAE
        CALIFORNIA
        GLOBAL
        UNITED STATES
        ASIA PACIFIC
        UAE
        GLOBAL
        NEW YORK
        NEW YORK
        GLOBAL
        AFRICA
        GLOBAL
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        WASHINGTON DC
        GLOBAL
        UNITED KINGDOM
        GLOBAL
        GLOBAL
        UNITED KINGDOM
        UNITED STATES
        UNITED KINGDOM
        UNITED KINGDOM
        UNITED STATES
        LOS ANGELES
        UNITED STATES
        UNITED STATES
        UKRAINE
        LOS ANGELES
        UAE
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        UNITED STATES
        GLOBAL
        GLOBAL
        GLOBAL
        NEW YORK
        GLOBAL
        UNITED STATES
        GLOBAL
        GLOBAL
        UNITED STATES
        `;
        // Convert the list into an array, removing any duplicate entries
        $location_array = array_unique(array_filter(explode("\n", $locations)));

        $sites = [

        ];

        foreach(range(1, 100) as $index){
            $site1 = Site::create([
            'user_id' => 1,
            'site_name' =>  $faker->domainWord(),
            'site_url' =>  $faker->domainName(),
            'site_category' =>  (string)$category_array[array_rand($category_array, 1)],
            'site_domain_rating' =>  $faker->numberBetween(1,100),
            'site_domain_authority' =>  $faker->numberBetween(1,100),
            'site_price' =>  $faker->numberBetween(50,1000),
            'site_time' => '1-3 Days',
            'site_sposored' =>  'N',
            'site_indexed' =>  'Y',
            'site_dofollow' =>  (string)$rand_yes_no[array_rand($rand_yes_no, 1)],
            'site_region_location' =>  'GLOBAL' //$location_array[array_rand($location_array, 1)],
            ]);
      }
    }
}
