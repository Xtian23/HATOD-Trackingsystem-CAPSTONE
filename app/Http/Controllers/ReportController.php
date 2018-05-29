<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Product;
use App\Personnel;
use DB;
use App\OrderLine;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $AllOrders=Order::with(['details.product', 'customer', 'deliveryPersonnel']);

        $AllCustomers = Customer::all();
        $AllProducts = Product::all();
        $AllPersonnels = Personnel::where('personneltype', '=', "delivery")->get();

        $search = $request->search;
        $AllOrders=Order::when($search, function ($q)use ($search) {
                $q->where('customer_id', 'like', "%{$search}%")
                ->orwhere('order_date', 'like', "%{$search}%")
                ->orwhere('status', 'like', "%{$search}%")
                ->orwhere('payment_method', 'like', "%{$search}%")
                ->orwhere('served_by', 'like', "%{$search}%")
                 ->orwhere('delivered_by', 'like', "%{$search}%");
        })->orderBy('order_date')->paginate(10);

      
        return view('report',[
            'orders'=>$AllOrders
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
