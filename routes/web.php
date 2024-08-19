<?php

use App\Events\TaskNotification;
use App\Http\Controllers\Backend\BalanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Backend\SiteController;
use App\Http\Controllers\Backend\BillingController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\Payment\PaypalController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\TaskController;
use App\Models\Message;
use App\Models\Site;
use App\Models\Task;
use App\Models\User;
use App\Notifications\EmailNotification;
use App\Notifications\SmsNotification;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;
use SheetDB\SheetDB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $sites = Site::all();
    return view('site' , compact('sites'));

})->name('index');





Route::get('/dev', function () {


  return view('dev');

})->name('dev');


Route::get('/service_worker', function () {

    return view('admin.service_worker');

})->name('service_worker');




Route::get('/notification', function () {

    return view('admin.notification');

})->name('notification');


Route::get('/hamza/pusher', function () {

  return view('admin.hamza_pusher');


})->name('pusher_test');

Route::any('/hamza/pusher_dev/send', function () {

    $options = array(
        'cluster' => 'ap2',
        'encrypted' => true
    );
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );


    $pusher->trigger('task_chanel', 'App\Events\TaskNotification', 'hello hamza this is test notification from Pusher');

     // Define the Artisan command
    //$command = 'php ' . base_path('artisan') . ' queue:work --stop-when-empty > /dev/null 2>&1 &';

    // Execute the command in the background
    //exec($command);

     return 'TaskNotification successfuly executed ..';


  });

Route::get('/notify', function () {

    $task = Task::where('status',5)->with(['post','order'])->first();

    // $user_id = $task->user_id;

    $options = array(
        'cluster' => 'ap2',
        'encrypted' => true
    );
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );
    $data['data'] = $task;


    $pusher->trigger('my_chanel', 'App\Events\TaskNotification', $data);

     return 'success';
    //return event(new TaskNotification('test notification'));

})->name('notify');



Route::get('/hamza_msg', function () {


    $message = 'hello from cherki hamza full stack at dubai';

    $options = array(
        'cluster' => 'ap2',
        'encrypted' => true
    );
    $pusher = new Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        $options
    );
    $data['data'] = $message;


    $pusher->trigger('my_message', 'App\Events\MessageEvent', $data);

     return 'success';

});



/* Route::get('/db_dev', function () {

    $dbName = 'test_publisher';

    try {
        $dbHost = env('DB_HOST');
        $dbUsername = env('DB_USERNAME');
        $dbPassword = env('DB_PASSWORD');

        $pdo = new \PDO("mysql:host=$dbHost", $dbUsername, $dbPassword);
        $pdo->exec("CREATE DATABASE `$dbName`");

        return response()->json(['message' => 'Database created successfully.'], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }



})->name('db_dev'); */




/* Route::get('/sms', function () {

     $user = User::first();

     $basic  = new \Vonage\Client\Credentials\Basic(env('NEXMO_KEY'), env('NEXMO_SECRET'));
     $client = new \Vonage\Client($basic);

     // Set the CA bundle path for Guzzle with a relative path
            $guzzleClient = new \GuzzleHttp\Client([
                'verify' => storage_path('cacert.pem'),
            ]);
            $client->setHttpClient($guzzleClient);




     $response = $client->sms()->send(
        new \Vonage\SMS\Message\SMS('971551087029', 'PR Content Dubai', 'Hello from Pr Content Creation')
    );

    $message = $response->current();

    if ($message->getStatus() == 0) {
        echo "The message was sent successfully\n";
    } else {
        echo "The message failed with status: " . $message->getStatus() . "\n";
    }

     //$user->notify(new SmsNotification);

     //Notification::send($user , new SmsNotification($user));

    // return 'sms success';

})->name('sms'); */


Route::get('/hamza', function () {
    $users = User::whereNot('role','super-admin')->get();
    foreach($users as $user){
        Notification::send($user , new EmailNotification($user));
    }

    /* $messages = [
        ['name' => 'WelcomeMessage', 'message' => 'Welcome to our website!'],
        ['name' => 'AccountCreated', 'message' => 'Your account has been created successfully.'],
        ['name' => 'EmailVerification', 'message' => 'Please check your email to verify your account.'],
        ['name' => 'PasswordUpdated', 'message' => 'Your password has been updated.'],
        ['name' => 'LoginSuccessful', 'message' => 'Login successful!'],
        ['name' => 'LogoutSuccessful', 'message' => 'Logout successful!'],
        ['name' => 'ProfileUpdated', 'message' => 'Your profile has been updated.'],
        ['name' => 'SettingsSaved', 'message' => 'Your settings have been saved.'],
        ['name' => 'NewNotification', 'message' => 'You have a new notification.'],
        ['name' => 'SubscriptionActivated', 'message' => 'Your subscription has been activated.'],
        ['name' => 'SubscriptionCanceled', 'message' => 'Your subscription has been canceled.'],
        ['name' => 'EventRegistered', 'message' => 'You have successfully registered for the event.'],
        ['name' => 'PaymentProcessed', 'message' => 'Your payment was processed successfully.'],
        ['name' => 'OrderShipped', 'message' => 'Your order has been shipped.'],
        ['name' => 'OrderDelivered', 'message' => 'Your order has been delivered.'],
        ['name' => 'NewMessage', 'message' => 'You have a new message.'],
        ['name' => 'RequestSubmitted', 'message' => 'Your request has been submitted.'],
        ['name' => 'AppointmentConfirmed', 'message' => 'Your appointment has been confirmed.'],
        ['name' => 'TicketClosed', 'message' => 'Your ticket has been closed.'],
        ['name' => 'FeedbackThankYou', 'message' => 'Thank you for your feedback!']
    ]; */

       /* $messages = [];
        for ($i = 1; $i <= 200; $i++) {
            $messages[] = [
                'name' => 'Message' . $i,
                'message' => 'This is message number ' . $i . '.'
            ];
        }

        foreach($users as $user){

            foreach($messages as $message){
            Notification::send($user , new EmailNotification($user,$message));
            }

        } */

    // Define the Artisan command
    $command = 'php ' . base_path('artisan') . ' queue:work --stop-when-empty > /dev/null 2>&1 &';

    // Execute the command in the background
    exec($command);

    return redirect(route('index'));

    // Return a response immediately
    /* return response()->json([
        'message' => 'Queue work command started in the background',
    ]); */

    /* Artisan::call('queue:work', [
        '--stop-when-empty' => true,
    ]);

    // Optionally, you can capture the output
    $output = Artisan::output();

     // Split the output into lines
     $lines = explode(PHP_EOL, $output);

    // Return a response or view
    return response()->json([
        'message' => 'Queue work command executed',
        'output' => $lines,
    ]); */

    //return '<h1 style="color:red">task done</h1>';
})->name('hamza');


Route::get('publishers/publisher_data' , [SiteController::class , 'publisher_data'])->name('publisher_data');

/* Route::get('/dev', function (Request $request) {

     $response = Http::get('https://ipinfo.io/86.98.23.13?token=4fa8145b7d9ec3');

    $result = $response->json();

})->name('dev'); */

/* Route::get('/dev' , [SiteController::class , 'dev'])->name('dev'); */

Auth::routes([
    /* 'register'  => false,
    'reset'     => false,
    'confirm'   => false */
]);


// Route::middleware(['auth'])->get('/admin', [DashboardController::class, 'index'])->name('admin');

Route::prefix('admin')->middleware(['auth'])->group(function () {


    Route::get('/', [DashboardController::class, 'index'])->name('admin');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->middleware(['permission:read user'])->name('user.index');
        Route::post('user', 'store')->middleware(['permission:create user'])->name('user.store');
        Route::post('user/show', 'show')->middleware(['permission:read user'])->name('user.show');
        Route::put('user', 'update')->middleware(['permission:update user'])->name('user.update');
        Route::delete('user', 'destroy')->middleware(['permission:delete user'])->name('user.destroy');
    });

    // Security routes
    Route::get('/security' , [UserController::class,'security'])->name('security');
    Route::put('/security/update_email' , [UserController::class,'update_email'])->name('update_email');
    Route::put('/security/update_mobile' , [UserController::class,'update_mobile'])->name('update_mobile');
    Route::put('/security/update_password' , [UserController::class,'update_password'])->name('update_password');

    // role routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->middleware(['permission:read role'])->name('role.index');
        Route::post('role', 'store')->middleware(['permission:create role'])->name('role.store');
        Route::post('role/show', 'show')->middleware(['permission:read role'])->name('role.show');
        Route::put('role', 'update')->middleware(['permission:update role'])->name('role.update');
        Route::delete('role', 'destroy')->middleware(['permission:delete role'])->name('role.destroy');
    });

    // permission routes
    Route::controller(PermissionController::class)->group(function () {
        Route::get('permission', 'index')->middleware(['permission:read permission'])->name('permission.index');
        Route::post('permission', 'store')->middleware(['permission:create permission'])->name('permission.store');
        Route::post('permission/show', 'show')->middleware(['permission:read permission'])->name('permission.show');
        Route::put('permission', 'update')->middleware(['permission:update permission'])->name('permission.update');
        Route::delete('permission', 'destroy')->middleware(['permission:delete permission'])->name('permission.destroy');
        Route::get('permission/reload', 'reloadPermission')->middleware(['permission:create permission'])->name('permission.reload');
    });



   // payements Gatways ***********************************************************************

    //Balance page
    Route::get('/balance/{id?}' , [BalanceController::class , 'balance'])->name('balance');
    Route::get('/add_funds' , [BalanceController::class , 'add_funds'])->name('add_funds');

    Route::post('pay', [PaypalController::class, 'pay'])->name('paypal_pay');
    // Route::get('success/{paymentId}/{PayerID}', [PaypalController::class, 'success'])->name('success');
    Route::get('error', [PaypalController::class, 'error'])->name('error');

    // Paypal
    Route::post('/payment' , [PaypalController::class , 'payment'])->name('payment');
    Route::get('/cancel' , [PaypalController::class , 'cancel'])->name('cancel');
   Route::get('/payment/success' , [PaypalController::class , 'success'])->name('success');

    // payements Gatways *************************************************************************

    // route for Profile

    // routes for tasks
    Route::get('project/{project_id?}/my_orders/not_started' , [TaskController::class,'not_started'])->name('not_started');
    Route::get('project/{project_id?}/my_orders/in_progress' , [TaskController::class,'in_progress'])->name('in_progress');
    Route::get('project/{project_id?}/my_orders/pending_approval' , [TaskController::class,'pending_approval'])->name('pending_approval');
    Route::get('project/{project_id?}/my_orders/improvement' , [TaskController::class,'improvement'])->name('improvement');
    Route::get('project/{project_id?}/my_orders/pr_publisher' , [TaskController::class,'pr_publisher'])->name('pr_publisher');
    Route::get('project/{project_id?}/my_orders/completed' , [TaskController::class,'completed'])->name('completed');
    Route::get('project/{project_id?}/my_orders/rejected' , [TaskController::class,'rejected'])->name('rejected');


    // single task for mail
    Route::get('task/{task_id}/task_mail_not_started' , [TaskController::class,'task_mail_not_started'])->name('task_mail_not_started');
    Route::get('task/{task_id}/task_mail_in_progress' , [TaskController::class,'task_mail_in_progress'])->name('task_mail_in_progress');
    Route::get('task/{task_id}/task_mail_pending_approval' , [TaskController::class,'task_mail_pending_approval'])->name('task_mail_pending_approval');
    Route::get('task/{task_id}/task_mail_improvement' , [TaskController::class,'task_mail_improvement'])->name('task_mail_improvement');
    //Route::get('task/{task_id}/task_mail_pr_publisher' , [TaskController::class,'task_mail_pr_publisher'])->name('task_mail_pr_publisher');
    Route::get('task/{task_id}/task_mail_completed' , [TaskController::class,'task_mail_completed'])->name('task_mail_completed');
    Route::get('task/{task_id}/task_mail_rejected' , [TaskController::class,'task_mail_rejected'])->name('task_mail_rejected');


    // Routes for show the  tasks
    Route::get('project/{project_id?}/task/{task_id?}/show_task' , [OrderController::class,'show_task'])->name('show_task');

    // Route for posts
    // route for create new post by task an project
    Route::get('project/{project_id?}/task/{task_id?}/post/create' , [PostController::class,'index'])->name('create_post');
    // route for store new post and if its in_progress or client_approval
    Route::post('project/{project_id?}/task/{task_id?}/post/store_post' , [PostController::class,'store_post'])->name('store_post');
    // route for update the post
    Route::post('project/{project_id?}/task/{task_id?}/post/{post_id?}/update_post' , [PostController::class,'update_post'])->name('update_post');



    // route for all publisher sites for super admin
    Route::get('all_publishers',[SiteController::class,'all_publishers'])->name('all_publishers');

    // add publisher site
    Route::get('add_publishers',[SiteController::class,'add_publishers'])->name('add_publishers');
    Route::post('store_publishers',[SiteController::class,'store_publishers'])->name('store_publishers');
    Route::get('edit_publishers/{site_id}/edit',[SiteController::class,'edit_publishers'])->name('edit_publishers');
    Route::put('update_publishers/{site_id}/update',[SiteController::class,'update_publishers'])->name('update_publishers');

    // site publishers routes
    //Route::get('publishers',[SiteController::class,'index'])->name('publishers');
    // add to favorite
    Route::get('/favorite_site/{site_id}',[SiteController::class,'favorite'])->name('favorite');
    // show all favorite publishers by user
    Route::get('publishers/{project_id}/favorite_publishers',[SiteController::class,'favorite_publishers'])->name('favorite_publishers');

    // route for see the blacklist publishers
    Route::get('publishers/{project_id}/blacklist_publishers',[SiteController::class,'blacklist_publishers'])->name('blacklist_publishers');
    // route for add to blacklist
    Route::post('publisher/site/{site_id}/project/{project_id}/add_blacklist_publishers',[SiteController::class,'add_blacklist_publishers'])->name('add_blacklist_publishers');
    // route for remove to blacklist
    Route::delete('publisher/site/{site_id}/project/{project_id}/remove_blacklist_publishers',[SiteController::class,'remove_blacklist_publishers'])->name('remove_blacklist_publishers');



    Route::get('chat/messages',[DashboardController::class,'chat_messages'])->name('chat');
    Route::get('chat/messages/delete_chat', function(){
        Message::truncate();
        return redirect()->back()->with('success' ,'Messages Deleted with success');
    })->name('delete_chat');

});
