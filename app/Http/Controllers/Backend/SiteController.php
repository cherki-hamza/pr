<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{

    // client all publishers for client
    public function site_index(Request $request){

        $title = "publishers";
        $project_id = $request->project_id;
        //$sites = Site::all();
        $sites_count = Site::count();

        $categories = Site::whereNotIn('site_category',['-','OFF'])->distinct()
                        ->get(['site_category']);


        if($request->search_url){ // filter by url

            $sites = Site::where('site_url', 'like', '%' . request('search_url') . '%')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

        }elseif($request->categories){ // filter by category

            $sites = Site::where('site_category', 'like', '%' . request('categories') . '%')->paginate(12);

            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

        }elseif ($request->site_monthly_traffic) {  // filter by monthly traffic

            if( $request->site_monthly_traffic == 'LowToHigh'){
                $sites = Site::OrderBy('site_monthly_traffic', 'Asc')->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }else{
                $sites = Site::OrderBy('site_monthly_traffic', 'Desc')->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

         }elseif($request->site_domain_rating){ // filter by DR

            if( $request->site_domain_rating == 'LowToHigh'){
                $sites = Site::OrderBy('site_domain_rating', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));;
            }else{
                $sites = Site::OrderBy('site_domain_rating', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif($request->site_domain_authority){ // filter by DA

            if( $request->site_domain_authority == 'LowToHigh'){
                $sites = Site::OrderBy('site_domain_authority', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));;
            }else{
                $sites = Site::OrderBy('site_domain_authority', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif (!empty(request('search'))) {  // search method
            //return $request->search;
            $sites = Site::where('site_name', 'like', '%' . request('search') . '%')
                          ->OrWhere('site_region_location' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_url' , 'like', '%' . request('search') . '%')->paginate(12);
             return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
        } else {
            //$sites = Site::all();
            $sites = Site::paginate(20);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
        }



    }

    // the publishers index page
    public function index(Request $request){

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::all();
        $sites_count = Site::count();


        return view('admin.publishers.publishers',compact('project_id','sites','sites_count'));
    }

    // all publisheres for super admin
    public function all_publishers(Request $request){

        if (!empty(request('search'))) {
            //return $request->search;
            $sites = Site::where('site_name', 'like', '%' . request('search') . '%')
                          ->OrWhere('site_region_location' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_category' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_url' , 'like', '%' . request('search') . '%')->paginate(12);
        } else {
            $sites = Site::paginate(12);
        }


        $title = "publishers";
        $project_id = $request->project_id;
        //$sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.all_publishers',compact('project_id','sites','sites_count'));
    }

    // method for create and add new publisher
    public function add_publishers(){
       return view('admin.publishers.add_publisher');
    }

    // method for sow the page when to edit the site publisher
    public function edit_publishers(Request $request){
        $site = Site::where('id' , $request->site_id)->firstOrFail();
        return view('admin.publishers.edit_publisher' , compact('site'));
    }


    // method for eframe publisher data in datatabe in home site page
    public function publisher_data(){
        $sites = Site::latest()->paginate(5);
        $site_count = Site::count();
        $latest_update = Site::latest()->first()->created_at->format('M d Y');
        return view('admin.publishers.publisher_data',compact('sites','site_count','latest_update'));
    }

    // method for update the site publisher
    public function update_publishers(Request $request){

        $site = Site::where('id' , $request->site_id)->firstOrFail();


        /* $request->validate([
            'site_name' => 'required',
            'site_url' => 'required',
            'site_cat' => 'required',
            'site_price' => 'required',
            'site_tat' => 'required',
            'site_country' => 'required',
         ]); */

        $site->update([
             'site_name' => $request->get('site_name'),
             'site_url' => $request->get('site_url'),
             'site_category' => $request->get('site_cat'),
             'site_price' => $request->get('site_price'),
             'site_region_location' => $request->get('site_country'),

             'site_domain_authority' => $request->get('site_da'),
             'site_domain_rating' => $request->get('site_dr'),
             'site_sposored' => $request->get('site_sponsored'),
             'site_indexed' => $request->get('site_indexed'),

             'site_dofollow' => $request->get('site_dofollow'),
             'site_images' => $request->get('site_images'),
             'site_time' => $request->get('site_tat'),
        ]);
        return redirect()->back()->with('success', 'The Site Publisher Updated Successfully!');
    }

    public function favorite_publishers(Request $request,$project_id){
        $title = "Favorite Publishers";
        $user = auth()->user();
        $sites =  $user->favorite(Site::class);
        //$sites = Site::paginate(10);
        $sites_count = Site::count();
        return view('admin.publishers.favorite_publishers',compact('sites','sites_count','title'));
    }

    public function favorite(Request $request,$site_id){
        $site = Site::where('id',request()->site_id)->firstOrFail();
        $check = $site->favoritesCount;
        if($check){
            $site->toggleFavorite();
            return redirect()->back()->with('warning', 'The Site Publisher Removed from Favorite Successfully!');
        }else{
            $site->toggleFavorite();
            return redirect()->back()->with('success', 'The Site Publisher add to Favorite Successfully!');
        }

    }

    // function for store publishers site
    public function store_publishers(Request $request){
        /* $request->validate([
           'site_name' => 'required',
           'site_url' => 'required',
           'site_cat' => 'required',
           'site_price' => 'required',
           'site_tat' => 'required',
           'site_country' => 'required',
        ]); */

        Site::create([
            'user_id'   => auth()->id(),
            'site_name' => $request->get('site_name'),
            'site_url' => $request->get('site_url'),
            'site_category' => $request->get('site_cat'),
            'site_price' => $request->get('site_price'),
            'site_region_location' => $request->get('site_country'),

            'site_domain_authority' => $request->get('site_da'),
            'site_domain_rating' => $request->get('site_dr'),
            'site_sposored' => $request->get('site_sponsored'),
            'site_indexed' => $request->get('site_indexed'),

            'site_dofollow' => $request->get('site_dofollow'),
            'site_images' => $request->get('site_images'),
            'site_time' => $request->get('site_tat'),

        ]);


        return redirect()->back()->with('success', 'The Site Publisher added Successfully!');

    }

    // private methodes
    private function stringToNumeric($str) {
         // Check if it's in - format
        if (strpos($str, '-') !== false) {
            $num = 0;
        }
        // Check if it's in million format
        if (strpos($str, 'M') !== false) {
            $num = floatval(str_replace('M', '', $str)) * 1000000;
        }
        // Check if it's in thousand format
        elseif (strpos($str, 'k') !== false) {
            $num = floatval(str_replace('k', '', $str)) * 1000;
        }
        // If it's a regular number
        else {
            $num = floatval($str);
        }
        return $num;
    }

}
