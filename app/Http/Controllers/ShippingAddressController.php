<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingAddressRequest;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $shippingaddress = ShippingAddress::where('user_id', $user->id)->first();
        return view(
            'cart.shippingaddress.index',
            [
                'title' => 'Alamat Pengiriman',
                'shippingaddress' => $shippingaddress,
                'data' => ShippingAddress::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingAddressRequest $request)
    {
        $itemuser = $request->user();
        $input = $request->all();
        $input['user_id'] = $itemuser->id;
        $input['status'] = 'utama';
        $shippingaddress = ShippingAddress::create($input);
        ShippingAddress::where('id', '!=', $shippingaddress->id)
            ->update(['status' => 'tidak']);
        return back()->with('success', 'Alamat pengiriman berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $shippingaddress =  ShippingAddress::findOrFail($id);
        $shippingaddress->update(['status' => 'utama']);
        ShippingAddress::where('id', '!=', $id)->update(['status' => 'tidak']);
        return back()->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingAddress  $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingAddress $shippingAddress)
    {
        //
    }
}
