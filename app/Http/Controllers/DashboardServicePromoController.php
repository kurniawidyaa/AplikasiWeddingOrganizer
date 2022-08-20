<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePromoRequest;
use App\Models\Service;
use App\Models\ServicePromo;
use Exception;
use Illuminate\Http\Request;

class DashboardServicePromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotion = ServicePromo::orderBy('id', 'desc')->paginate(20);
        return view('dashboard.service.promo.index', [
            'title' => 'Service Promo',
            'promo' => $promotion,
            'submit' => 'Tambah Promo'
        ])->with('no', ($request->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            //ambil data dari service
            $service = Service::orderBy('service_name', 'desc')
                ->get();
            return view('dashboard.service.promo.create', [
                'title' => 'Form Promo Layanan',
                'service' => $service
            ]);
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        return response()->json($service);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicePromoRequest $request)
    {
        try {
            // cek dulu apakah sudah ada, produk hanya bisa masuk 1 promo
            $cekpromo = ServicePromo::where('service_id', $request->service_id)->first();
            if ($cekpromo) {
                // return back()->with('error', 'Data sudah ada');
            } else {
                $useritem = $request->user();
                $input = $request->all();
                $input['user_id'] = $useritem->id;
                $promoitem = ServicePromo::create($input);
                return redirect()->route('owner.promo.index')->with('success', 'Data berhasil disimpan');
            }
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($cekpromo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServicePromo  $ServicePromo
     * @return \Illuminate\Http\Response
     */
    public function show(ServicePromo $ServicePromo)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServicePromo  $ServicePromo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promo = ServicePromo::findOrFail($id);
        return view('dashboard.service.promo.edit', [
            'title' => 'Detail Layanan',
            'promo' => $promo,
            'submit' => 'test',
            'service' => Service::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServicePromo  $ServicePromo
     * @return \Illuminate\Http\Response
     */
    public function update(ServicePromoRequest $request, $id)
    {
        try {
            $promo = ServicePromo::findOrFail($id);
            $checkpromo = ServicePromo::where('service_id', $request->service_id)
                ->where('id', '!=', $promo->id)
                ->first();

            if ($checkpromo) {
                // return back()->with('error', 'Data sudah ada');
            } else {
                $user = $request->user();
                $input = $request->all();
                $input['user_id'] = $user->id;
                $promo->update($input);
                return redirect()->route('owner.promo.index')->with('success', 'Data berhasil diupdate');
            }
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        return response()->json($checkpromo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServicePromo  $ServicePromo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $promo = ServicePromo::findOrFail($id);
            if ($promo->delete()) {
                return back()->with('success', 'Data berhasil dihapus');
            }
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        return response()->json($promo->delete());
    }

    public function loadasync($id)
    {
        $service = Service::findOrFail($id);
        $respon = [
            'status' => 'success',
            'msg' => 'Data ditemukan',
            'service' => $service
        ];
        return response()->json($respon, 200);
    }
}
