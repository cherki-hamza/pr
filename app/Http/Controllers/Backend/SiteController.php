<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SiteController extends Controller
{
    // the publishers index page
    public function index($q=null){
        $title = "publishers";
        $sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.publishers2',compact('sites','sites_count'));
    }

    public function favorite_publishers(Request $request){
        $title = "Favorite Publishers";
        $sites = Site::paginate(10);
        $sites_count = Site::count();
        return view('admin.publishers.favorite_publishers',compact('sites','sites_count','title'));
    }

    public function favorite(Request $request,$site_id){
        return $request->all();
    }


}
