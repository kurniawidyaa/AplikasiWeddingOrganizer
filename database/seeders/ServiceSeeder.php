<?php

namespace Database\Seeders;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dekorasi
        Service::insert([
            'service_category_id' => '1',
            'service_code' => mt_rand(100, 999),
            'identifier' => 'dekorasi-silver',
            'service_thumbnail' => '',
            'service_name' => 'Dekorasi Silver',
            'service_describe' => '  <p>Tenda 80m2 - 100m2</p>
                            <p>Pelaminan 4m - 6m </p>
                            <p>Kursi Pelaminan</p>
                            <p>Mini Garden Pelaminan</p>
                            <p>Pergola</p>
                            <p>Standing Flower Pelaminan</p>
                            <p>Kotak Uang</p>
                            <p>Kursi Futura 100</p>
                            <p>Meja Prasmanan 1 set</p>
                            <p>Pemanas Rooltop 4</p>
                            <p>Sangku Nasi</p>
                            <p>Piring Sendok Garpu 150</p>
                            <p>Meja Tamu 1 set</p>
                            <p>Gubukan 2</p>
                            <p>Dekor Meja Akad & Kursi Tiffany</p>
                            <p>Janur 1</p>',
            'service_note' => '-',
            'service_qty' => 1,
            'service_price' => 13000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Service::insert([
            'service_category_id' => '1',
            'service_code' => mt_rand(100, 999),
            'identifier' => 'dekorasi-gold',
            'service_thumbnail' => '',
            'service_name' => 'Dekorasi Gold',
            'service_describe' => '  <p>Tenda 120m2 - 150m2</p>
                            <p>Pelaminan 6m - 8m</p>
                            <p>Kursi Pelaminan</p>
                            <p>Mini Garden Pelaminan</p>
                            <p>Pergola</p>
                            <p>Gajebo</p>
                            <p>Standing Flower Pelaminan</p>
                            <p>Full Karpet</p>
                            <p>Kotak Uang</p>
                            <p>Kursi Futura 100 + Cover</p>
                            <p>Meja Prasmanan 1 set</p>
                            <p>Pemanas Rooltop 5</p>
                            <p>Sangku Nasi 1</p>
                            <p>Piring Sendok Garpu 200</p>
                            <p>Meja Tamu 1 set</p>
                            <p>Gubukan 3</p>
                            <p>Dekor Meja Akad & Kursi Tiffany</p>
                            <p>Blower</p>
                            <p>Janur 1</p>',
            'service_note' => '-',
            'service_qty' => 1,
            'service_price' => 16000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Service::insert([
            'service_category_id' => '1',
            'service_code' => mt_rand(100, 999),
            'identifier' => 'dekorasi-platinum',
            'service_thumbnail' => '',
            'service_name' => 'Dekorasi Platinum',
            'service_describe' => '  <p>Tenda 180m2 - 200m2</p>
                            <p>Pelaminan 8m - 10m</p>
                            <p>Kursi Pelaminan</p>
                            <p>Mini Garden Pelaminan</p>
                            <p>Pergola</p>
                            <p>Standing Flower Pelaminan</p>
                            <p>Standing Flower jalan 6</p>
                            <p>Full Karpet</p>
                            <p>Kotak Uang</p>
                            <p>Kursi Futura 150 + Cover</p>
                            <p>Meja Prasmanan 1 set</p>
                            <p>Pemanas Rooltop 8</p>
                            <p>Sangku Nasi 2</p>
                            <p>Piring Sendok Garpu 300</p>
                            <p>Meja Tamu 1 set</p>
                            <p>Gubukan 4</p>
                            <p></p>
                            <p>Dekor Meja Akad & Kursi Tiffany</p>
                            <p>Blower 3</p>
                            <p>Janur 1</p>
                            <p>Backdrop Photobooth</p>',
            'service_note' => '-',
            'service_qty' => 1,
            'service_price' => 22000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // MUA & Busana
        Service::insert([
            'service_category_id' => '2',
            'service_code' => mt_rand(100, 999),
            'identifier' => 'Akad Gold',
            'service_thumbnail' => '',
            'service_name' => 'akad-gold',
            'service_describe' => '  <p>Makeup + Busana Akad Pengantin Wanita</p>
                            <p>Beskap/Jas Pengantin Pria</p>
                            <p>Makeup Ibu + Kebaya Ibu 2 Pasang</p>
                            <p>Beskap Bapak 2 Pasang</p>
                            <p>Ronce Melati 1 Pasang</p>
                            <p>Aksesoris Pengantin</p>',
            'service_note' => '-',
            'service_qty' => 1,
            'service_price' => 5000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Service::insert([
            'service_category_id' => '2',
            'service_code' => mt_rand(100, 999),
            'identifier' => 'resepsi-silver',
            'service_thumbnail' => '',
            'service_name' => 'Resepsi Silver',
            'service_describe' => '  <p>Makeup + Busana Akad Pengantin Wanita</p>
                            <p>Makeup + Busana Resepsi Pengantin Wanita</p>
                            <p>Beskap/Jas Pengantin Pria 2</p>
                            <p>Makeup Ibu + Kebaya Ibu 2 Pasang</p>
                            <p>Beskap Bapak 2 Pasang</p>
                            <p>Ronce Melati 1 Pasang</p>
                            <p>Aksesoris Pengantin + Aksesoris Orang Tua</p>',
            'service_note' => '-',
            'service_qty' => 1,
            'service_price' => 7000000,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
