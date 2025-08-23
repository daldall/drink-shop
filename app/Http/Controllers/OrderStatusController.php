<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // pastikan model Order sudah ada

class OrderStatusController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->get();
        return view('orders.status', compact('orders'));
    }
}
