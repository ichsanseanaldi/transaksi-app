@extends('main')

@section('child')

    @if (count($data)>=1)
        <h1 style="text-align: center">Daftar Transaksi</h1>
        <div class="overflowed">
            <ul class="responsive-table m-20-ud">
                <li class="table-header">
                    <div class="col col-1">No</div>
                    <div class="col col-4">Nomor Transaksi</div>
                    <div class="col col-3">Tanggal Transaksi</div>
                    <div class="col col-2">Nama Customer</div>
                    <div class="col col-1">Jumlah Barang</div>
                    <div class="col col-4">Subtotal</div>
                    <div class="col col-4">Diskon</div>
                    <div class="col col-1">Ongkir</div>
                    <div class="col col-3">Total Bayar</div>
                </li>
                @foreach ($data as $cust)
                    <li class="table-row">
                        <div class="col col-1">{{ $loop->iteration }}</div>
                        <div class="col col-4">{{ $cust->nomor_transaksi }}</div>
                        <div class="col col-3">{{ date('d-M-Y', strtotime($cust->tanggal_transaksi)) }}</div>
                        <div class="col col-2">{{ $cust->nama_cust }}</div>
                        <div class="col col-1">{{ $cust->jumlah_barang }}</div>
                        <div class="col col-4">
                            <span class="number-format">
                                {{ $cust->subtotal }}
                            </span>
                        </div>
                        <div class="col col-4">
                            <span class="number-format">
                                {{ $cust->diskon_coupon }}
                            </span>
                        </div>
                        <div class="col col-1">
                            <span class="number-format">
                                {{ $cust->ongkir }}
                            </span>
                        </div>
                        <div class="col col-3">
                            <span class="number-format">
                                {{ $cust->total_bayar }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div style="text-align:end; margin-top:30px">
            <h2>
                Grand Total : Rp.
                <span class="number-format">
                    {{$data[0]->grand_total}}
                </span> 
            </h2>
        </div>
    @else
        <em style="text-align: center; margin-top:30px;">
            <h1>Belum ada Transaksi</h1>
        </em>
    @endif 
        
@endsection