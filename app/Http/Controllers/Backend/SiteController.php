<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{

    public function site_index(Request $request){

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.publishers',compact('project_id','sites','sites_count'));
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

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.all_publishers',compact('project_id','sites','sites_count'));
    }

    // method for create and add new publisher
    public function add_publishers(){
       return view('admin.publishers.add_publisher');
    }

    // method for sow the page when to edit the site publisher
    public function edit_publishers(Request $request){
        $site = Site::where('id' , $request->site_id)->first();
        return view('admin.publishers.edit_publisher' , compact('site'));
    }

    // method for update the site publisher
    public function update_publishers(Request $request){

        $site = Site::where('id' , $request->site_id)->first();


        $request->validate([
            'site_name' => 'required',
            'site_url' => 'required',
            'site_cat' => 'required',
            'site_price' => 'required',
            'site_tat' => 'required',
            'site_country' => 'required',
         ]);

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
        $site = Site::where('id',request()->site_id)->first();
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
        $request->validate([
           'site_name' => 'required',
           'site_url' => 'required',
           'site_cat' => 'required',
           'site_price' => 'required',
           'site_tat' => 'required',
           'site_country' => 'required',
        ]);

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


}
