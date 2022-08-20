<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Order;
use App\Models\ShippingAddress;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            // menampilkan semua cart 
            $order = Order::whereHas('cart', function ($q) use ($user) {
                $q->where('cart_status', 'checkout');
                $q->where('user_id', $user->id);
            })->orderBy('created_at', 'desc')
                ->paginate(20);

            return view('cart.order.index', [
                'title' => 'Riwayat Transaksi',
                'order' => $order,
                'user' => $user,
                'submit' => 'Cetak Invoice',
            ])->with('no', ($request->input('page', 1) - 1) * 20);

            // if (Auth::guard('owner') && Auth::guard('admin')) {
            //     return view('cart.order.index', [
            //         'title' => 'admin',
            //         'order' => $order,
            //         'user' => $user,
            //         'submit' => 'Edit',
            //         'detail' => 'Detail'
            //     ]);
            // } elseif (Auth::guard('web')) {

            // }
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($sc);
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
            // dd($request->all());
            $user = $request->user();

            $cart = Cart::where('cart_status', 'cart')
                ->where('user_id', $user->id)
                ->first();

            // if shipping address has statuses = utama, input order
            if ($cart) {
                $shippingaddress = ShippingAddress::where('user_id', $user->id)
                    ->where('status', 'utama')->firstOrFail();

                if ($shippingaddress) {
                    // create var input order
                    $order = new Order;
                    $order->cart_id = $cart->id;
                    $order->shipping_address_id = $shippingaddress->id;
                    $order->delivery_date = $request->delivery_date;

                    // store order
                    $order->save();

                    // update cart status
                    $cart->update(['cart_status' => 'checkout']);

                    return redirect()->route('user.order.index');
                } else {
                    return back()->with('error', 'Alamat pengiriman belum diisi');
                }
            } else {
                return abort('404'); //kalo ternyata ga ada shopping cart, maka akan menampilkan error halaman tidak ditemukan
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $user = $request->user();

        $order = Order::where('id', $id)
            ->first();

        if ($order) {
            return view('cart.order.show', [
                'title' => 'Invoice',
                'order' => $order,
                'cartdetail' => CartDetail::all()
            ]);
        } else {
            return abort('404');
        }
        // if (Auth::guard('owner') && Auth::guard('admin')) {
        //     $order = Order::findOrFail($id);
        //     return view('cart.order.show', [
        //         'title' => 'Detail Transaksi',
        //         'order' => $order
        //     ]);
        // } else {

        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generatePDF()
    {
        try {
            $order = Order::first();

            $data = [
                'order' => $order
            ];

            $pdf = Pdf::loadView('pdf.invoice', $data)->setOption(['defaultFont' => 'sans-serif']);
            return $pdf->download('invoice.pdf');
        } catch (Exception $e) {
            //throw $th;
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($pdf);
    }
}
