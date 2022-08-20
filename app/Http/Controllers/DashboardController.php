<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $user = User::all();
        $order = Order::whereHas('cart', function ($q) use ($user) {
            $q->where('cart_status', 'checkout');
            $q->where('user_id', $user->id);
        })->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'order' => $order,
            'user' => $user,
        ]);
    }
}
