<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::select('clients.name', 'clients.document', 'orders.order_detail', 'orders.total')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $order = new Order();
      
        $orderDetail = new OrderDetail();
        $idOrder = $order ->id;
        $cont = 0;

        while ($cont < count($request->item)) {
            # code...
        }
        $order ->client_id = $request ->client_id;
        $order->save();
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $orders = Order::where('status','=','1') ->orderBy ('name')->get();
        return view('orders.create',compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
