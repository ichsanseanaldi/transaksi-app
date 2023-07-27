@extends('main')

@section('child')

    {{-- {{ dd($data) }} --}}

    @if (count($data)>=1)
        <h1 class="m-20-ud">
            Daftar Transaksi
        </h1>
        <div class="inside">
            <div class="overflowed">
                <ul class="responsive-table m-10-ud">
                    <li class="table-header">
                        <div class="col col-1">No</div>
                        <div class="col col-4">Nomor Transaksi</div>
                        <div class="col col-4">Tanggal Transaksi</div>
                        <div class="col col-3">Nama Customer</div>
                        <div class="col col-1">Jumlah Barang</div>
                        <div class="col col-4">Subtotal</div>
                        <div class="col col-4">Diskon</div>
                        <div class="col col-1">Ongkir</div>
                        <div class="col col-4">Total Bayar</div>
                    </li>
                    @foreach ($data as $cust)
                        <li class="table-row">
                            <div class="col col-1">{{ $loop->iteration }}</div>
                            <div class="col col-4">{{ $cust->nomor_transaksi }}</div>
                            <div class="col col-4">{{ date('d-M-Y', strtotime($cust->tanggal_transaksi)) }}</div>
                            <div class="col col-3">{{ $cust->nama_cust }}</div>
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
                            <div class="col col-4">
                                <span class="number-format field-collect">
                                    {{ $cust->total_bayar }}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div style="display:flex;justify-content:flex-end;margin-top:20px">
                <h2 class="grand-wrapper">
                    Grand Total : <br class="space"/> Rp.
                    <span class="number-format grand-total">
                    </span> 
                </h2>
            </div>
        </div>
    @else
        <em style="text-align: center; margin-top:30px;">
            <h1>Belum ada Transaksi</h1>
        </em>
    @endif 

    <script src="/js/grandTotalHandler.js"></script>

        
@endsection