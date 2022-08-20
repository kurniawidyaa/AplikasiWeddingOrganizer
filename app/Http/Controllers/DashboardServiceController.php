<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ServiceRequest;
use App\Models\ServiceCategory;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class DashboardServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service.index', [
            'submit' => 'Tambah Data',
            'service' => Service::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create', [
            'submit' => 'Tambah',
            'servcategories' => ServiceCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $identifier = Str::slug($request->name);
        $thumbnail = request()->file('thumbnail') ?
            request()->file('thumbnail')->store('images/service') : null;

        $attr = $request->all();
        $attr['identifier'] = $identifier;
        $attr['thumbnail'] = $thumbnail;

        Service::create($attr);

        // if ($request->hasFile('image')) {
        //     $filenameWithExt = $request->file('image')->getClientOriginalExtension();

        //     // get filename
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //     // get just extention
        //     $extension = $request->file('image')->getClientOriginalExtension();

        //     // filename to store
        //     $filenameToStore = $filename . '_' . time() . '.' . $extension;

        //     // upload image
        //     $path = $request->file('image')->storeAs('image/portfolio', $filenameToStore);

        //     // else add a dummy image
        // } else {
        //     $filenameToStore = 'noimage.jpg';
        // }

        Alert::toast('<p style="color:#ffffff">Data berhasil ditambahkan!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        // kondisi saat yang sedang login owner atau admin 
        if (Auth::guard('owner')) {
            return redirect()->route('owner.serv.index'); //memanggil menggunakan route name
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.serv.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $identifier
     * @return \Illuminate\Http\Response
     */
    public function show($identifier)
    {
        $service = Service::where('identifier', $identifier)->first();
        return view('dashboard.service.show', [
            'service' => $service,
            'submit' => 'Kembali',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $identifier
     * @return \Illuminate\Http\Response
     */
    public function edit($identifier)
    {
        $Service = Service::where('identifier', $identifier)->first();
        return view('dashboard.service.edit', [
            'service' => $Service,
            'submit' => 'Update',
            'servcategories' => ServiceCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $identifier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $identifier)
    {
        try {
            $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/service') : null;
            $service = Service::where('identifier', '=', $identifier)->firstOrFail();
            if ($service) {
                $service->service_category_id = $request->service_category_id;
                $service->service_thumbnail = $thumbnail;
                $service->service_name = $request->name;
                $service->service_describe = $request->feature;
                $service->service_note = $request->note;
                $service->service_qyt = $request->qyt;
                $service->service_price = $request->price;
                $service->save();
            }
            Alert::toast('<p style="color:#ffffff">Data berhasil diupdate!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        if (Auth::guard('owner')) {
            return redirect()->route('owner.serv.index'); //memanggil menggunakan route name
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.serv.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $identifier
     * @return \Illuminate\Http\Response
     */
    public function destroy($identifier)
    {
        Service::where('identifier', $identifier)->delete();
        return response()->json(['status' => 'Data anda berhasil dihapus.']);
        return redirect('service');
    }
}
