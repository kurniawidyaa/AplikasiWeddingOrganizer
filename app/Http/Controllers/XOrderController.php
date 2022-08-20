<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:web');
    // }


    public function detail($identifier)
    {
        $service = Service::where('identifier', $identifier)->first();
        return view('serviceDetail', [
            'service' => $service,
            'submit' => 'Pesan Sekarang'
        ]);
    }

    public function order(Request $request, $identifier)
    {
        try {
            $service = Service::where('identifier', $identifier)->first();
            $date = Carbon::now();

            // validasi apakah melebihi stok/tidak
            // total qyt ditarik dr name field input dalam serviceDetail
            if ($request->totalQyt > $service->qyt_left) {
                return redirect('/order' . $identifier);
            }

            // cek validasi
            $orderCheck = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

            // save to order database
            if (empty($orderCheck)) {
                $order = new Order;
                $order->user_id = Auth::user()->id;
                $order->code = mt_rand(100, 999);
                $order->date = $date;
                $order->status = 0;
                $order->totalPrice = 0;
                $order->save();
            }

            // save to order_details db
            $newOrder = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();

            // check order_details
            $orderDetailCheck = OrderDetail::where('service_id', $service->identifier)->where('order_id', $newOrder->id)->first();

            if (empty($orderDetailCheck)) {
                $orderDetail = new OrderDetail;
                $orderDetail->service_id = $service->id;
                $orderDetail->order_id = $newOrder->id;
                $orderDetail->qyt = $request->totalQyt;
                $orderDetail->totalPrice = $service->price * $request->totalQyt;
                $orderDetail->save();
            } else {
                $orderDetail = OrderDetail::where('service_id', $service->identifier)->where('order_id', $newOrder->id)->first();

                $orderDetail->qyt = $orderDetail->qyt + $request->totalQyt;

                // new price
                $orderDetail->totalPrice = $orderDetail->totalPrice + ($service->price * $request->totalQyt);
                $orderDetail->update();
            }

            // total price
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $order->totalPrice = $order->totalPrice + ($service->price * $request->totalQyt);
            $order->update();

            Alert::toast('<p style="color:#ffffff">Data berhasil dtambahkan!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');
            // redirect('check-out');

        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        return redirect('user/checkout');
        // return response()->json($order);
    }

    public function checkout()
    {
        try {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $orderDetail = [];
            if (!empty($order)) {
                $orderDetail = OrderDetail::where('order_id', $order->id)->get();
            }
            return view('chart', ['title' => 'Keranjang Saya'], compact('order', 'orderDetail'));
            // return view('order.checkout', compact('order', 'orderDetail'));
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($orderDetail);
    }

    public function delete($id)
    {
        try {
            $orderDetail = OrderDetail::where('id', $id)->first();
            $order = Order::where('id', $orderDetail->order_id)->first();
            $order->totalPrice = ($order->totalPrice - $orderDetail->totalPrice);
            $order->update();
            $orderDetail->delete();

            // return response()->json(['status' => 'Data anda berhasil dihapus.']);

            return back();
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($orderDetail);
    }

    public function deleteall($id)
    {
        try {
            $order = Order::where('id', $id)->firstOrFail();
            $order->OrderDetail()->delete();
            $order->update($order, '-' . $order->totalPrice);
            return back();
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }
        return response()->json($order);
    }

    public function confirm()
    {
        $user = User::where('id', Auth::id())->first();

        if (empty($user->address)) {
            Alert::toast('<p style="color:#ffffff">Identitas harap dilengkapi!</p>', 'error')->width('24rem')->background('#800000')->padding('0,25rem');
            return redirect();
        }

        if (empty($user->phone)) {
            Alert::toast('<p style="color:#ffffff">Identitas harap dilengkapi!</p>', 'error')
                ->width('24rem')->background('#800000')->padding('0,25rem');
            return redirect();
        }

        $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $order_id = $order->id;
        $order->status = 1;
        $order->update();

        $orderDetail = OrderDetail::where('order_id', $order_id)->get();

        foreach ($orderDetail as $orderDetail) {
            $service = Service::where('identifier', $orderDetail->service_id)->first();
            $service->qyt = ($service->qyt - $orderDetail->totalQyt);
            $service->update();
        }

        return back();
    }
}
