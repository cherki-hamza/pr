<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blacklist;
use App\Models\Site;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{

    // client all publishers for client
    public function site_index(Request $request){

        // this method for get the index and publishere website & make searsh by filter
            $title = "publishers";
            $project_id = $request->project_id;
            // start get site instence
            $query = Site::query();
            //  remove the not approved site
            $query->whereNot('site_status','2');
          // $query->whereNot('publisher_status','2');

            // start new instance from Site Model
            if(request()->routeIs('same_day_delivery')){
                $query->where('site_time' ,'1 Day')
                    ->orWhere('site_time' ,'1 day')
                    ->orWhere('site_time' ,'1 days');
            }


        $sites_count = $query->count();

        $categories = $query->whereNotIn('site_category',['-','OFF'])->distinct()
                        ->get(['site_category']);

        // get the ids of publishers i worked it and att array result
        $ids_sites = Task::where('user_id' , auth()->id())->pluck('id');

        // action for search options
        if($request->input('search_action') == 's'){

            // site_domain_authority condition
            if($request->da || $request->da_to){
                $query->whereBetween('site_domain_authority', [(int)$request->da, (int)$request->da_to]);
            }

            // site_domain_rating condition
            if($request->dr || $request->dr_to){
                $query->whereBetween('site_domain_rating', [(int)$request->dr, (int)$request->dr_to]);
            }

             // site_price condition
             if($request->price || $request->price_to){
                $query->whereBetween('site_price', [(int)$request->price, (int)$request->price_to]);
            }

            // category condition
            if($request->category && $request->category != 'all'){

                 $query->where('site_category', $request->category);
             }

             //  site language condition
              if($request->websiteLanguage && $request->websiteLanguage != 'all'){
                 $query->where('site_language', $request->websiteLanguage);
             }

             // linkType condition
             if($request->linkType && $request->linkType != 'all'){

                if($request->linkType == 'do_Follow'){
                     $query->where('site_dofollow', 'Yes');
                }

                if($request->linkType == 'no_follow'){
                     $query->where('site_dofollow', 'No');
                }

             } // end linkType

             // sponsor
            if($request->sponsored && $request->sponsored != 'all'){
                if( $request->sponsored == 'Yes'){
                    //return 'ExcludeWebsitesIHaveWorkedWith';
                    $sites =  $query->where('site_sposored', 'Yes')->paginate(12);

                  return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
                }

                if( $request->sponsored == 'No'){
                    // return 'OnlyWebsitesIHaveWorkedWith';
                    $sites =  $query->where('site_sposored', 'No')->paginate(12);
                    return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
                }


            } // end sponsor


             // spamScore
             if($request->spamScore && $request->spamScore != 'all'){

                $sites =  $query->where('spam_score', '>=' , (int)$request->spamScore)->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

            } // end spamScore

            // site worked with it and not worked with it
            if($request->worked){
                return 'worked';
                if( $request->worked == 'ExcludeWebsitesIHaveWorkedWith'){
                    $sites =  $query->whereNotIn('id', $ids_sites)->paginate(12);

                  return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
                }

                if( $request->worked == 'OnlyWebsitesIHaveWorkedWith'){
                    $sites =  $query->whereIn('id', $ids_sites)->paginate(12);
                    return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
                }


            } // end site worked with it and not worked with it



             $sites = $query->paginate(20);

            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
        }

        // start new instance from Site Model
        // $query = Site::query();


         // list ids of blacklist publishers sites
         $idsToExclude = Blacklist::where('user_id',auth()->id())->pluck('id');

         // remove the blacklist publishers site from the results
         if(count($idsToExclude) > 0){
            $query->whereNotIn('id', $idsToExclude);
        }


        if($request->search_url){ // filter by url

            $sites = $query->where('site_url', 'like', '%' . str_replace(array('http://', 'https://'), '', request('search_url')) . '%')->paginate(12); //
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

        }elseif($request->categories){ // filter by category

            if($request->categories == 'all'){
                $sites = $query->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

            $sites = $query->where('site_category', 'like', '%' . request('categories') . '%')->paginate(12);

            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

        }elseif ($request->site_monthly_traffic) {  // filter by monthly traffic

            if( $request->site_monthly_traffic == 'LowToHigh'){
                $sites = $query->orderBy('site_monthly_traffic', 'ASC')->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }else{
                $sites = $query->orderBy('site_monthly_traffic', 'DESC')->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

         }elseif($request->site_domain_rating){ // filter by DR

            if( $request->site_domain_rating == 'LowToHigh'){
                $sites = $query->orderBy('site_domain_rating', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));;
            }else{
                $sites = $query->orderBy('site_domain_rating', 'DESC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif($request->site_domain_authority){ // filter by DA

            if( $request->site_domain_authority == 'LowToHigh'){
                $sites = $query->orderBy('site_domain_authority', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));;
            }else{
                $sites = $query->orderBy('site_domain_authority', 'DESC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif (!empty(request('search'))) {  // search method
            //return $request->search;
            $sites = $query->where('site_name', 'like', '%' . request('search') . '%')
                          ->OrWhere('site_region_location' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_url' , 'like', '%' . request('search') . '%')->paginate(12);
             return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));

        }elseif($request->Price){

            if( $request->Price == 'LowToHigh'){
                $sites = $query->orderBy('site_price', 'ASC')->paginate(12);
            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

            if( $request->Price == 'HighToLow'){
                $sites = $query->orderBy('site_price', 'DESC')->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

            if( $request->Price == 'all'){
                $sites = $query->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif($request->publisher){


            if( $request->publisher == 'ExcludeWebsitesIHaveWorkedWith'){
                //return 'ExcludeWebsitesIHaveWorkedWith';
                $sites =  $query->whereNotIn('id', $ids_sites)->paginate(12);

              return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

            if( $request->publisher == 'OnlyWebsitesIHaveWorkedWith'){
                // return 'OnlyWebsitesIHaveWorkedWith';
                $sites =  $query->whereIn('id', $ids_sites)->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

        }elseif($request->websiteLanguage){

            if($request->websiteLanguage == 'all'){
                $sites = $query->paginate(12);
                return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
            }

             $sites =  $query->where('site_language',  $request->websiteLanguage)->paginate(12);



            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));



        }else {

            /* if(count($idsToExclude) > 0){
                $sites = $query->whereNotIn('id', $idsToExclude)->paginate(20);
            }else{

            } */

            $sites = $query->paginate(20);

            return view('admin.publishers.publishers',compact('project_id','sites','sites_count','categories'));
        }



    }

    // the publishers index page
    public function index(Request $request){

        $title = "publishers";
        $project_id = $request->project_id;
        $sites = Site::whereNot('site_status','2')->get();
        $sites_count = Site::whereNot('site_status','2')->count();


        return view('admin.publishers.publishers',compact('project_id','sites','sites_count'));
    }

    // all publisheres for super admin
    public function all_publishers(Request $request){

        if (!empty(request('search'))) {
            //return $request->search;
            $sites = Site::where('site_name', 'like', '%' . request('search') . '%')
                          ->whereNot('site_status','2')
                          ->OrWhere('site_region_location' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_language' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_category' , 'like', '%' . request('search') . '%')
                          ->OrWhere('site_url' , 'like', '%' . request('search') . '%')->paginate(12);
        } else {
            $sites = Site::whereNot('site_status','2')->paginate(12);
        }


        $title = "publishers";
        $project_id = $request->project_id;
        //$sites = Site::all();
        $sites_count = Site::count();
        return view('admin.publishers.all_publishers', ['project_id' =>  $project_id , 'sites'  => $sites , 'sites_count' => $sites_count , 'searsh'=> request('search')]);
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
        $sites = Site::whereNot('site_status','2')->latest()->paginate(5);
        $site_count = Site::whereNot('site_status','2')->count();
        $latest_update = Site::whereNot('site_status','2')->latest()->first()->created_at->format('M d Y');
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
             'site_url' => preg_replace("(^https?://)", "", $request->get('site_url')),
             'site_category' => $request->get('site_cat'),
             'site_price' => $request->get('site_price'),
             'site_region_location' => $request->get('site_country'),

             'site_domain_authority' => $request->get('site_da'),
             'site_domain_rating' => $request->get('site_dr'),
             'site_sposored' => $request->get('site_sponsored'),
             'site_indexed' => $request->get('site_indexed'),

             'word_limite'  => $request->get('word_limite'),

             'site_dofollow' => $request->get('site_dofollow'),
             'spam_score' => $request->get('spam_score'),
             'site_time' => $request->get('site_tat'),

             'site_c_p_price' => $request->get('site_c_p_price'),
             'site_c_c_p_price' => $request->get('site_c_c_p_price'),

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
            'site_url' => preg_replace("(^https?://)", "", $request->get('site_url')) ,
            'site_category' => $request->get('site_cat'),
            'site_price' => $request->get('site_price'),
            'site_region_location' => $request->get('site_country'),

            'site_domain_authority' => $request->get('site_da'),
            'site_domain_rating' => $request->get('site_dr'),
            'site_sposored' => $request->get('site_sponsored'),
            'site_indexed' => $request->get('site_indexed'),

            'word_limite'  => $request->get('word_limite'),

            'site_dofollow' => $request->get('site_dofollow'),
            'spam_score' => $request->get('spam_score'),
            'site_time' => $request->get('site_tat'),

            'site_c_p_price' => $request->get('site_c_p_price'),
             'site_c_c_p_price' => $request->get('site_c_c_p_price'),

        ]);


        return redirect()->back()->with('success', 'The Site Publisher added Successfully!');

    }


    // method for show the blacklist publisher
    public function blacklist_publishers(){

         // start new instance from Site Model
         $query = Site::query();

         // list ids of blacklist publishers sites
         $idsToExclude = Blacklist::where('user_id',auth()->id())->pluck('id');

         $sites = $query->whereIn('id', $idsToExclude)->paginate(20);
         return view('admin.publishers.blacklist_publishers' , compact('sites'));
    }


    // method for add the blacklist publisher
    public function add_blacklist_publishers(Request $request){

        Blacklist::create([
              'user_id' => auth()->user()->id,
              'project_id' =>  $request->project_id,
              'site_id' => $request->site_id
        ]);

        return back()->with('success','Publisher Added To blacklist successfuly');
    }

    // method for restore the blacklist publisher
    public function remove_blacklist_publishers(Request $request){

         $site = Blacklist::where('user_id',auth()->id())->where('site_id' , $request->site_id)->first();
         if($site){
            $site->delete();
            return back()->with('success','Publisher Restore from blacklist successfuly');
         }else{
            return back()->with('danger','Publisher site not found check with the super admin');
         }


    }


    public function sites_api(Request $request){

      $site_id = Site::where('site_url' ,$request->site_url)->firstOrFail()->id;
      $tasks = Task::where('site_id' , $site_id)->get() ?? [];
      return response()->json(['tasks' => $tasks]);

    }

}
