<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ShippingAddress;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $cartitem = Cart::where('user_id', $user->id)
            ->where('cart_status', 'cart')
            ->first();

        if ($cartitem) {
            return view('cart.index', [
                'title' => 'Keranjang Belanja',
                'cartitem' => $cartitem,
            ]);
        } else {
            return view('cart.emptyCart');
        }
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
    public function checkout(Request $request)
    {
        try {
            $useritem = $request->user();
            $cartitem = Cart::where('user_id', $useritem->id)
                ->where('cart_status', 'cart')
                ->firstOrFail();
            $shippingaddress = ShippingAddress::where('user_id', $useritem->id)
                ->where('status', 'utama')
                ->first();

            if ($cartitem) {
                return view('cart.checkout', [
                    'title' => 'Checkout',
                    'cartitem' => $cartitem,
                    'shippingaddress' => $shippingaddress
                ]);
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

        return response()->json($cartitem);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $cartitem = Cart::findOrFail($id);
            // CartDetail->extend model Cart 
            // updateTotal-> function update on model
            $cartitem->CartDetail()->delete();
            $cartitem->updateTotal($cartitem, '-' . $cartitem->cart_subtotal);

            return response()->json($cartitem);
            return back()->with('success', 'Cart berhasil dikosongkan');
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }
    }

    public function co(Request $request)
    {
        try {
            $user = $request->user();
            $cartitem =  Cart::where('user_id', $user->id)
                ->where('cart_status', 'cart')
                ->first();
            $shippingaddress = ShippingAddress::where('user_id', $user->id)
                ->where('status', 'utama')
                ->first();

            if ($cartitem) {
                // return response()->json($cartitem);
                return view('cart.checkout', [
                    'cartitem' => $cartitem,
                    'shippingaddress' => $shippingaddress,
                ]);
            } else {
                return abort('404');
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
    }
}
