<?php

namespace App\Http\Controllers;

use App\Models\SalesJoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesDetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = SalesJoint::join('barangs','sales_joint.barang_id','=','barangs.barang_id')
                            ->join('sales','sales_joint.sales_id','=','sales.sales_id')
                            ->join('customers','sales.cust_id','=','customers.cust_id')
                            ->select(
                                'nomor_transaksi',
                                'tanggal_transaksi',
                                'nama_cust',
                                'subtotal',
                                'ongkir',
                                'diskon_coupon',
                                'total_bayar',
                                'quantity',
                                DB::raw('SUM(quantity) as jumlah_barang'),
                            )
                            ->groupBy(DB::raw('sales.sales_id'),)
                            ->get();                 
                            
        return view('history',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
