<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Service;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CartDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'service_id' => 'required'
            ]);
            $useritem = $request->user();
            $serviceitem = Service::findOrFail($request->service_id);

            // check there's have shopping cart or no to user have login
            $cart = Cart::where('user_id', $useritem->id)
                ->where('cart_status', 'cart')
                ->first();

            if ($cart) {
                $cartitem = $cart;
            } else {
                $invoice_number = Cart::where('user_id', $useritem->id)->count();

                // store to cart table
                $cartinput['user_id'] = $useritem->id;
                $cartinput['invoice_number'] = 'INV ' . str_pad(($invoice_number + 1), '3', '0', STR_PAD_LEFT);
                $cartinput['cart_date'] = Carbon::now();
                $cartinput['cart_status'] = 'Cart';
                $cartinput['payment_status'] = 'Belum';
                $cartitem = Cart::create($cartinput);
            }

            // cek apakah sudah ada layanan dlm cart
            $detailcheck = CartDetail::where('cart_id', $cartitem->id)->where('service_id', $serviceitem->id)->first();
            $qty = 1; //set value qty
            $price = $serviceitem->service_price;
            // discount diambil jika ada promo
            $discount = $serviceitem->promo != null ? $serviceitem->promo->nominal_discount : 0;
            $subtotal = ($qty * $price) - $discount;

            // update cart detail
            if ($detailcheck) {
                // update detail on cart detail
                $detailcheck->updateDetail($detailcheck, $qty, $price, $discount);
                $detailcheck->Cart->updateTotal($detailcheck->Cart, $subtotal);
            } else {
                $input = $request->all();
                $input['cart_id'] = $cartitem->id;
                $input['service_id'] = $serviceitem->id;
                $input['cart_detail_qty'] = $qty;
                $input['cart_detail_price'] = $price;
                $input['cart_detail_discount'] = $discount;
                $input['cart_detail_subtotal'] = ($price * $qty) - $discount;
                $detailitem = CartDetail::create($input);
                // update total on cart table
                $detailitem->Cart->updateTotal($detailitem->Cart, $subtotal);
            }
            Alert::toast('<p style="color:#ffffff">Data berhasil dtambahkan!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');
            return redirect()->route('user.cart.index');
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }
        return response()->json($detailcheck);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CartDetail $cartDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $detailitem = CartDetail::findOrFail($id);
            $param = $request->param;

            if ($param == 'tambah') {
                // update detail cart
                $qty = 1;
                $detailitem->updateDetail($detailitem, $qty, $detailitem->cart_detail_price, $detailitem->cart_detail_discount);

                // update total cart
                $detailitem->cart->updateTotal($detailitem->cart, ($detailitem->cart_detail_price - $detailitem->cart_detail_discount));
                return back()->with('success', 'Item berhasil diupdate');
            } elseif ($param == 'kurang') {
                // updat detail cart
                $qty = 1;
                $detailitem->updateDetail($detailitem, '-' . $qty, $detailitem->cart_detail_price, $detailitem->cart_detail_discount);
                // update total
                $detailitem->cart->updateTotal($detailitem->cart, '-' . ($detailitem->cart_detail_price - $detailitem->cart_detail_discount));
                return back()->with('success', 'Item berhasil diupdate');
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
        return response()->json($detailitem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detailitem = CartDetail::findOrFail($id);
        // update total cart
        $detailitem->Cart->updateTotal($detailitem->Cart, '-' . $detailitem->cart_detail_subtotal);
        if ($detailitem->delete()) {
            return back()->with('success', 'Item berhasil dihapus');
        } else {
            return back()->with('error', 'Item gagal dihapus');
        }
    }
}
