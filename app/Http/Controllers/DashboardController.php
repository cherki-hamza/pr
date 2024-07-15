<?php

namespace App\Http\Controllers;

use App\Charts\TaskChart;
use App\Charts\TaskPieChart;
use App\Models\Setting;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{

    // method for show the dashboard
    public function index(Request $request){


        // get all new tasks
        if(auth()->user()->role == 'client'){
            $tasks = Task::where('user_id',auth()->id())->where('status',Task::NOT_STARDET)->get();
        }elseif(auth()->user()->role == 'super-admin'){
            $tasks = Task::where('status',Task::NOT_STARDET)->get();
        }else{
            $tasks = [];
        }


        $array = [
            29, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6,
            148.5, 218, 194.1, 95.6, 54.4
        ];

        // Find the minimum and maximum values
        $minValue = min($array);
        $maxValue = max($array);

        // Traverse the array and replace min and max values with objects
        $result = array_map(function($value) use ($minValue, $maxValue) {
            if ($value == $minValue) {
                return ['y' => $value, 'id' => 'min'];
            } elseif ($value == $maxValue) {
                return ['y' => $value, 'id' => 'max'];
            } else {
                return $value;
            }
        }, $array);

        // Print the resulting array
        /* echo '<pre>';
        print_r($result);
        exit(); */

        $title       = 'Dashboard';
        $x['title']         = 'Dashboard';
        $x['user']          = User::get();
        $x['role']          = Role::get();
        $x['permission']    = Permission::get();


        $tasks_title = [];
        $task_backgrounds = [];
        $task_colors = [];
        $tasks_data = [];
        $super_admin_background = [
            'rgba(33, 37, 41, 0.2)',
            'rgba(13, 202, 240, 0.2)',
            'rgba(255, 193, 7, 0.2)',
            'rgba(13, 110, 253, 0.2)',
            'rgba(138, 43, 226, 0.2)',
            'rgba(25, 135, 84, 0.2)',
            'rgba(220, 53, 69, 0.2)'
        ];
        $client_background = [
            'rgba(33, 37, 41, 0.2)',
            'rgba(13, 202, 240, 0.2)',
            'rgba(255, 193, 7, 0.2)',
            'rgba(13, 110, 253, 0.2)',
            'rgba(25, 135, 84, 0.2)',
            'rgba(220, 53, 69, 0.2)'
        ];

        $super_admin_colors = [
            'rgb(33, 37, 41)',
            'rgb(13, 202, 240)',
            'rgb(255, 193, 7)',
            'rgb(13, 110, 253)',
            'rgb(138, 43, 226)',
            'rgb(25, 135, 84)',
            'rgb(220, 53, 69)'
        ];

        $client_colors = [
            'rgb(33, 37, 41)',
            'rgb(13, 202, 240)',
            'rgb(255, 193, 7)',
            'rgb(13, 110, 253)',
            'rgb(25, 135, 84)',
            'rgb(220, 53, 69)'
        ];

        $tasks_super_admin_names = ['Tasks Not Started' , 'Tasks In Progress' , 'Tasks Need Approvement' ,  'Tasks Need Immprovement' , 'Tasks Need Pr & Publisher To Approve' , 'Tasks Completed' , 'Tasks Rejected'];
        $tasks_client_names = ['Tasks Not Started' , 'Tasks In Progress' , 'Tasks Need Approvement' , 'Tasks Completed' , 'Tasks Rejected'];
        if(auth()->user()->role == 'client'){
            $tasks_title = $tasks_client_names;
            $task_backgrounds = $client_background;
            $task_colors = $client_colors;
            $tasks_data = [
                Task::TasksCount(Task::NOT_STARDET),
                Task::TasksCount(Task::IN_PROGRESS),
                Task::TasksCount(Task::PENDING_APPROVAL),
                Task::TasksCount(Task::COMPLETED),
                Task::TasksCount(Task::REJECTED)
            ];
        }elseif(auth()->user()->role == 'super-admin'){
            $tasks_title = $tasks_super_admin_names;
            $task_backgrounds = $super_admin_background;
            $task_colors = $super_admin_colors;
            $tasks_data = [
                Task::TasksCount(Task::NOT_STARDET),
                Task::TasksCount(Task::IN_PROGRESS),
                Task::TasksCount(Task::PENDING_APPROVAL),
                Task::TasksCount(Task::PUBLISHER_APPROVAL),
                Task::TasksCount(Task::COMPLETED),
                Task::TasksCount(Task::REJECTED)
            ];
        }else{
            $tasks_title = [];
        }


        $chart = new TaskChart;
        $chart->labels($tasks_title)
              ->dataset('Tasks Statistiques' , 'bar' , $tasks_data)
              ->options(
                [
                    'backgroundColor' => $task_backgrounds,
                    'borderColor' => $task_colors,
                    'borderWidth' => 2
                  ]
            );

        $chart->options([
            'tooltip' => [
                'show' => true // or false, depending on what you want.
            ]
        ]);

          return view('admin.dashboard',  compact('chart' ,'title' , 'result','tasks'));


    }


    // method for update paypal api settings
    public function update_paypal(Request $request){

        $PAYPAL_CLIENT_ID = $request->PAYPAL_CLIENT_ID;
        $PAYPAL_CLIENT_SECRET = $request->PAYPAL_CLIENT_SECRET;
        $PAYPAL_CURRENCY = $request->PAYPAL_CURRENCY;

        Setting::updateOrCreate(
            ['user_id' => 1 , 'key' => 'PAYPAL_SANDBOX_CLIENT_ID'],
            ['user_id' => 1 ,'value' => $PAYPAL_CLIENT_ID, 'key' => 'PAYPAL_SANDBOX_CLIENT_ID']
        );

        Setting::updateOrCreate(
            ['user_id' => 1 , 'key' => 'PAYPAL_SANDBOX_CLIENT_SECRET'],
            ['user_id' => 1 ,'value' => $PAYPAL_CLIENT_SECRET, 'key' => 'PAYPAL_SANDBOX_CLIENT_SECRET']
        );

        Setting::updateOrCreate(
            ['user_id' => 1 , 'key' => 'PAYPAL_CURRENCY'],
            ['user_id' => 1 , 'value' => $PAYPAL_CURRENCY , 'key' => 'PAYPAL_CURRENCY']
        );



        return redirect()->back()->with('success','Paypal Settings Api Updated with success');
    }

    // method for update site logo settings
    public function update_site_logo(Request $request){

      //return $request->logo;

       if($request->logo){

           $photo = $request->file('logo');

           $path = public_path('assets/images/logo');

           if(!is_dir($path)){
               mkdir($path , 0777 , true);
           }

           $file_extension = $photo->extension();


           $file_name = 'pr_logo_'.rand(1,100).'_'.time() . '.' . $file_extension;



           $photo->move($path,$file_name);


          Setting::updateOrCreate(
            ['user_id' => 1 , 'key' => 'logo'],
            ['user_id' => 1 , 'value' => '/assets/images/logo/'.$file_name]
        );

       }

       return back()->with('success','Logo Updated successfoly');


    }


    // method for chat messages
    public function chat_messages(){
        return view('admin.chat.chat2_messages');
    }

    public function renderTaskChart(){
        $statuses = [0,1,2,3,5,6];
        $data = [];

        foreach ($statuses as $status) {
            $data[] = Task::where('status', $status)->count();
        }

          return $data;
     }

    public function createChart(){

    $data = $this->renderTaskChart();
    $chart = Charts::new('pie', 'chartjs')
                    ->setTitle('Task Status Distribution')
                    ->setLabels(['Not Started', 'In Progress', 'Need Approval', 'Improvement', 'Completed', 'Rejected'])
                    ->setValues($data)
                    ->setDimensions(1000,500)
                    ->setResponsive(false);

    return view('admin.dashboard_chart', ['chart' => $chart]);

   }


}
