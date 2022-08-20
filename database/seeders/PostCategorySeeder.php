<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::insert([
            'name' => 'Lamaran',
            'slug' => 'lamaran',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        PostCategory::insert([
            'name' => 'Ide Pernikahan',
            'slug' => 'ide-pernikahan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        PostCategory::insert([
            'name' => 'Hubungan',
            'slug' => 'hubungan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        PostCategory::insert([
            'name' => 'Fiqih Rumah Tangga',
            'slug' => 'fiqih-rumah-tangga',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
