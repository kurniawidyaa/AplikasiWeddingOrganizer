<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Owner;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::insert([
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'phone' => '9080937409',
            'address' => 'Jl. palem kuning 2 blok.d no.55',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);

        Admin::insert([
            'name' => 'admin1',
            'email' => 'admin1@gmail.com',
            'phone' => '08576567646',
            'address' => 'Jl. kelinci no.27',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);

        Owner::insert([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt('password')
        ]);


        $this->call(ServiceCategorySeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(PostSeeder::class);
        User::factory(10)->create();
    }
}
