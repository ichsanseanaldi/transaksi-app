<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Customer;
use App\Models\Sales;
use App\Models\SalesJoint;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Mockery\Undefined;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $date = date('Ymd-').substr(strval(time()),8);
        $customerlist = Customer::all();
        $barangList = Barang::all();

        return view('transaksi',[
            'date'=>$date,
            'customerList'=>$customerlist,
            'barangList'=>$barangList
        ]);
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

        $validate = $request->validate([
            "cust_id"=>'required',
            "barang_id"=>'required',
            "quantity"=>'required',
            "diskon_persen"=>'required',
            "diskon_nilai"=>'required',
            "harga_setelah_diskon"=>'required',
            "total_harga_barang"=>'required',
            "nomor_transaksi"=>'required',
            "subtotal"=>'required',
            "ongkir"=>'required',
            "diskon_coupon"=>'required',
            "total_bayar"=>'required|integer',
            "tanggal_transaksi"=>'required',
        ]);

        $id = Sales::create([
            "cust_id"=>$validate["cust_id"],
            "nomor_transaksi"=>$validate["nomor_transaksi"],
            "tanggal_transaksi"=>$validate["tanggal_transaksi"]
        ])->id;
        
        $bulkedData = [];    

        for($i=0;$i<count($request->barang_id);$i++){

            array_push($bulkedData,[
                "sales_id"=>$id,
                "barang_id"=>Arr::flatten($validate["barang_id"])[$i],
                "quantity"=>Arr::flatten($validate["quantity"])[$i],
                "harga_setelah_diskon"=>Arr::flatten($validate["harga_setelah_diskon"])[$i],
                "diskon_persen"=>Arr::flatten($validate["diskon_persen"])[$i],
                "diskon_nilai"=>Arr::flatten($validate["diskon_nilai"])[$i],
                "total_harga_barang"=>Arr::flatten($validate["total_harga_barang"])[$i],
                "subtotal"=>$validate["subtotal"],
                "ongkir"=>$validate["ongkir"],
                "diskon_coupon"=>$validate["diskon_coupon"],
                "total_bayar"=>$validate["total_bayar"],
                "created_at"=>date("Y-m-d H:i:s"),
                "updated_at"=>date("Y-m-d H:i:s"),
            ]);
            
        }

        SalesJoint::insert($bulkedData);

        return back()->with('data',$bulkedData);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
