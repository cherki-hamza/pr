<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{

    public function site_index(Request $request,$project_id){

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.publishers2',compact('project_id','sites','sites_count'));
    }
    // the publishers index page
    public function index(Request $request){

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.publishers2',compact('project_id','sites','sites_count'));
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


}
