@extends('main')

@section('child')

    {{-- {{ dd($data) }} --}}

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
                @for($i=0; $i<count($data)-1;$i++)
                    <li class="table-row">
                        <div class="col col-1">{{ $i+1 }}</div>
                        <div class="col col-4">{{ $data[$i]->nomor_transaksi }}</div>
                        <div class="col col-3">{{ date('d-M-Y', strtotime($data[$i]->tanggal_transaksi)) }}</div>
                        <div class="col col-2">{{ $data[$i]->nama_cust }}</div>
                        <div class="col col-1">{{ $data[$i]->jumlah_barang }}</div>
                        <div class="col col-4">
                            <span class="number-format">
                                {{ $data[$i]->subtotal }}
                            </span>
                        </div>
                        <div class="col col-4">
                            <span class="number-format">
                                {{ $data[$i]->diskon_coupon }}
                            </span>
                        </div>
                        <div class="col col-1">
                            <span class="number-format">
                                {{ $data[$i]->ongkir }}
                            </span>
                        </div>
                        <div class="col col-3">
                            <span class="number-format field-collect">
                                {{ $data[$i]->total_bayar }}
                            </span>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
        <div style="text-align:end; margin-top:30px">
            <h2>
                Grand Total : Rp.
                <span class="number-format grand-total">
                </span> 
            </h2>
        </div>
    @else
        <em style="text-align: center; margin-top:30px;">
            <h1>Belum ada Transaksi</h1>
        </em>
    @endif 

    <script src="/js/grandTotalHandler.js"></script>

        
@endsection