<?php

namespace Database\Seeders;


use App\Models\ServiceCategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceCategory::insert([
            'name' => 'Dekorasi',
            'identifier' => 'dekorasi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        ServiceCategory::insert([
            'name' => 'Dokumentasi',
            'identifier' => 'dokumentasi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        ServiceCategory::insert([
            'name' => 'Hiburan',
            'identifier' => 'hiburan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        ServiceCategory::insert([
            'name' => 'MUA & Busana',
            'identifier' => 'mua-busana',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        ServiceCategory::insert([
            'name' => 'Adat & Kirab',
            'identifier' => 'adat-kirab',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        ServiceCategory::insert([
            'name' => 'Catering',
            'identifier' => 'catering',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
