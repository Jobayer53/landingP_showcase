<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name'          => 'required',
            'mobile'        => 'required',
            'address'       => 'required',
            'total_price'   => 'required',
        ]);

        $order = new Order();
        $order->name = $request->name;
        $order->mobile = $request->mobile;
        $order->address = $request->address;
        $order->total = $request->total_price;
        $order->save();
        return redirect()->route('thankyou');

    }
    public function thankyou(){
        return view('thank_you');
    }


    //dasboard
    public function index(){
        $orders = Order::latest()->paginate(10);
        return view('dashboard.pages.order.index',[
            'orders' => $orders
        ]);
    }
}
