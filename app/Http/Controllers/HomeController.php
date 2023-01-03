<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $service = Service::orderBy('service_category_id')->get();
        $pagination = Service::latest()->filter(request(['search', 'ServiceCategory']))->paginate(4)->withQueryString();
        return view('home', [
            'service' => $pagination,
            'servicecategory' => ServiceCategory::all(),
            'submit' => 'Detail Paket',
            'title' => 'Layanan'
        ]);
    }
}
