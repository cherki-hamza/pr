<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // start create super admin user
        $superadmin = User::create([
            'name'      => 'Superadmin',
            'email'     => 'hamza@overthetop.ae',
            'password'  => bcrypt('aA@00112233'),
            'role'      => 'super-admin'
        ]);
        $super_admin_profile = Profile::create([
            'user_id' => $superadmin->id,
            'email' => $superadmin->email,
            'fullname' => $superadmin->name,
            'picture' => $superadmin->GetGravatar(),
        ]);
        $superadmin->assignRole('superadmin');
        // end create super admin user

        // start create client 1 user
        $client1 = User::create([
            'name'      => 'jone',
            'email'     => 'jone25076@gmail.com',
            'password'  => bcrypt('aA@00112233')
        ]);
        $client_1_profile = Profile::create([
            'user_id' => $client1->id,
            'email' => $client1->email,
            'fullname' => $client1->name,
            'picture' => $client1->GetGravatar(),
        ]);
        $client1->assignRole('client');
        // end create client 1 user

         // start create client 2 user
         $client2 = User::create([
            'name'      => 'Client2',
            'email'     => 'cherkihamzafullstack@gmail.com',
            'password'  => bcrypt('aA@00112233')
        ]);
        $client_2__profile = Profile::create([
            'user_id' => $client2->id,
            'email' => $client2->email,
            'fullname' => $client2->name,
            'picture' => $client2->GetGravatar(),
        ]);
        $client2->assignRole('client');
        // end create client 2 user


        // start create 3 project for client 1
        $project1 = Project::create([
            'user_id'=> $client1->id,
            'project_name'=> 'Google',
            'project_url'=> 'https://google.com',
        ]);
        $project2 = Project::create([
            'user_id'=> $client1->id,
            'project_name'=> 'Amazone',
            'project_url'=> 'https://amazone.com',
        ]);
        $project3 = Project::create([
            'user_id'=> $client1->id,
            'project_name'=> 'Github',
            'project_url'=> 'https://github.com',
        ]);
        // end crete 3 project for client 1


         // start create 3 project for client 2
         $project4 = Project::create([
            'user_id'=> $client2->id,
            'project_name'=> 'project1',
            'project_url'=> 'https://google.com',
        ]);
        $project5 = Project::create([
            'user_id'=> $client2->id,
            'project_name'=> 'project2',
            'project_url'=> 'https://amazone.com',
        ]);
        $project6 = Project::create([
            'user_id'=> $client2->id,
            'project_name'=> 'project3',
            'project_url'=> 'https://github.com',
        ]);
        // end crete 3 project for client 2


    }
}
