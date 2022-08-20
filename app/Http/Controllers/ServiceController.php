<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // $service = Service::orderBy('service_category_id')->get();
        $pagination = Service::latest()->filter(request(['search', 'ServiceCategory']))->paginate(4)->withQueryString();
        return view('service', [
            'service' => $pagination,
            'servicecategory' => ServiceCategory::all(),
            'submit' => 'Detail Paket',
            'title' => 'Layanan'
        ]);
    }

    public function detail($identifier)
    {
        $service = Service::where('identifier', $identifier)->first();
        return view('serviceDetail', [
            'service' => $service,
            'submit' => 'Pesan Sekarang'
        ]);
    }

    public function loadasync($id)
    {
        $itemproduk = Service::findOrFail($id);
        $respon = [
            'status' => 'success',
            'msg' => 'Data ditemukan',
            'itemproduk' => $itemproduk
        ];
        return response()->json($respon, 200);
    }
}
