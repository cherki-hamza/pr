<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
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
        $superadmin = User::create([
            'name'      => 'Superadmin',
            'email'     => 'superadmin@pr.com',
            'password'  => bcrypt('123456789')
        ]);
        $super_admin_profile = Profile::create([
            'user_id' => $superadmin->id,
            'email' => $superadmin->email,
            'fullname' => $superadmin->name,
            'picture' => $superadmin->GetGravatar(),
        ]);
        $superadmin->assignRole('superadmin');

        $client = User::create([
            'name'      => 'Client',
            'email'     => 'client@pr.com',
            'password'  => bcrypt('123456789')
        ]);
        $admin_profile = Profile::create([
            'user_id' => $client->id,
            'email' => $client->email,
            'fullname' => $client->name,
            'picture' => $client->GetGravatar(),
        ]);
        $client->assignRole('client');


        // create 3 project
        $project1 = Project::create([
            'user_id'=> $superadmin->id,
            'project_name'=> 'Google',
            'project_url'=> 'https://google.com',
        ]);
        $project2 = Project::create([
            'user_id'=> $superadmin->id,
            'project_name'=> 'Amazone',
            'project_url'=> 'https://amazone.com',
        ]);
        $project3 = Project::create([
            'user_id'=> $superadmin->id,
            'project_name'=> 'Github',
            'project_url'=> 'https://github.com',
        ]);
    }
}
