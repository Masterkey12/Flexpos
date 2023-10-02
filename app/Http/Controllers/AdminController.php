<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getOrders() {
        $orders = Order::with(['item', 'customer'])->get();
        return view('orders.index', compact('orders'));
    }
    

}
