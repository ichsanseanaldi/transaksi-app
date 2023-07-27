@extends('main')

@section('child')

    <noscript>Turn on Javascript Please !</noscript>
    
    <h1 class="m-20-ud">
        <?xml version="1.0" encoding="utf-8"?>
        <svg width="30px" height="30px" viewBox="0 0 25 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.2998 5H22L20 12H8.37675M21 16H9L7 3H4M4 8H2M5 11H2M6 14H2M10 20C10 20.5523 9.55228 21 9 21C8.44772 21 8 20.5523 8 20C8 19.4477 8.44772 19 9 19C9.55228 19 10 19.4477 10 20ZM21 20C21 20.5523 20.5523 21 20 21C19.4477 21 19 20.5523 19 20C19 19.4477 19.4477 19 20 19C20.5523 19 21 19.4477 21 20Z" stroke="#404040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        Order Cart
    </h1>

    <div class="inside">

        @if(session('data'))
            <div class="m-10 success-msg">
                <em>{{ session('data') }}</em>
            </div>
        @endif

        @if($errors->any())
            <div class="m-10 error-msg">
                @foreach ($errors->all() as $error)
                    <em>{{ $error }}</em>
                @endforeach
            </div>
        @endif
    
        <div class="section-wrapper m-20-ud">
            <button class="customer-popup toggle-button" onclick="toggleButton(event,'customer')">
                Pilih Customer 
                <i>
                    <svg 
                        class="icon-svg-1"
                        height="10px" 
                        width="10px" 
                        version="1.1" 
                        id="Capa_1" 
                        xmlns="http://www.w3.org/2000/svg" 
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 185.343 185.343" 
                        xml:space="preserve"
                    >
                        <g>
                            <g>
                                <path style="fill:#000;" d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175
                                    l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934
                                    c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"/>
                            </g>
                        </g>
                    </svg>
                </i>
            </button>    
            <div class="customer-scroll">
                @foreach ($customerList as $customer)
                    <div 
                        class="customer-list" 
                        data-id={{ $customer->cust_id }} 
                        data-nama="{{ $customer->nama_cust }}"
                        data-kode="{{ $customer->kode_cust }}"
                        data-telp="{{ $customer->telp_cust }}"
                    >
                        <pre>Nama : {{ $customer->nama_cust }}</pre>   
                        <pre>Kode : {{ $customer->kode_cust }}</pre>    
                        <pre>Telp : {{ $customer->telp_cust }}</pre> 
                    </div>
                @endforeach
            </div>
            <div class="display m-10">
                <div class="user-display"></div>
            </div>
        </div>  
        <div class="section-wrapper m-20-ud">
            <button class="barang-popup toggle-button" onclick="toggleButton(event,'barang')">
                Tambah Barang
                <i>
                    <svg 
                        class="icon-svg-2"
                        height="10px" 
                        width="10px" 
                        version="1.1" 
                        id="Capa_1" 
                        xmlns="http://www.w3.org/2000/svg" 
                        xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 185.343 185.343" 
                        xml:space="preserve"
                    >
                        <g>
                            <g>
                                <path style="fill:#000;" d="M51.707,185.343c-2.741,0-5.493-1.044-7.593-3.149c-4.194-4.194-4.194-10.981,0-15.175
                                    l74.352-74.347L44.114,18.32c-4.194-4.194-4.194-10.987,0-15.175c4.194-4.194,10.987-4.194,15.18,0l81.934,81.934
                                    c4.194,4.194,4.194,10.987,0,15.175l-81.934,81.939C57.201,184.293,54.454,185.343,51.707,185.343z"/>
                            </g>
                        </g>
                    </svg>
                </i>
            </button>
            <div class="barang-scroll">
                @foreach ($barangList as $barang)
                    <div 
                        class="barang-list" 
                        data-id={{ $barang->barang_id }} 
                        data-nama="{{ $barang->nama_barang }}"
                        data-kode={{ $barang->kode_barang }}
                        data-harga={{ $barang->harga_barang }}
                    >
                        <div class="input-group">
                            <pre>Nama   : {{ $barang->nama_barang }}</pre>
                            <pre>Kode   : {{ $barang->kode_barang }}</pre>
                            <pre>Harga  : Rp.{{ $barang->harga_barang }}</pre>
                        </div>
                        <div class="input-group input">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" placeholder="quantity" value="1" class="quantity-input" min="1" max="30">
                        </div>
                        <div class="input-group input">
                            <label for="diskon-persen">Diskon</label>
                            <select name="diskon-persen" id="diskon-persen" class="diskon-persen-input">
                                <option value="0" selected>0%</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                            </select>
                        </div>
                        <button class="add-button">Tambah Barang +</button>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="result-wrapper">
            <form action="/transaksi" method="POST" class="form wrapper-test">
                @csrf
                <div class="customer-choice"></div>
                <div class="m-10 group-flex ">
                    <label for="nomor_transaksi">Nomor Transaksi :</label>
                    <input class="noborder" type="text" name="nomor_transaksi" id="nomor_transaksi" value={{ $date }}>
                </div>
                <div class="m-10 group-flex">
                    <label for="tanggal_transaksi">Tanggal Transaksi :</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi">
                </div>
                <h2 class="m-20-ud center ">Daftar Barang</h2>
                <div class="overflowed center">
                    <ul class="responsive-table">
                        <li class="table-header center">
                            <div class="col col-3">Nama</div>
                            <div class="col col-1">Kode</div>
                            <div class="col col-3">Harga</div>
                            <div class="col col-3">Quantity</div>
                            <div class="col col-3">Diskon (%)</div>
                            <div class="col col-3">Nilai Diskon</div>
                            <div class="col col-3">Harga Diskon</div>
                            <div class="col col-3">Total Harga</div>
                            <div class="col col-1">Action</div>
                        </li>
                        <div class="barang-choice"></div>
                    </ul>
                </div>
                <div class="wrapper-last">
                    <div class="wrapper-last-item">
                        <label for="subtotal">Subtotal :</label>
                        <input type="text" name="subtotal" id="subtotal" class="noborder" readonly required>
                    </div>
                    <div class="wrapper-last-item">
                        <label for="ongkir">Ongkos Kirim :</label>
                        <select name="ongkir" id="ongkir" class="ongkir" onchange="calculate(event)" required>
                            <option value="0" selected>Free Ongkir</option>
                            <option value="5000">Rp.5000</option>
                            <option value="7000">Rp.7000</option>
                            <option value="11000">Rp.11000</option>
                            <option value="19000">Rp.19000</option>
                        </select>
                    </div>
                    <div class="wrapper-last-item">
                        <label for="diskon_coupon">Diskon :</label>
                        <select name="diskon_coupon" id="diskon_coupon" class="diskon-coupon" onchange="calculate(event)" required>
                            <option value="0" selected>Rp.0</option>
                            <option value="5000">Rp.5000</option>
                            <option value="10000">Rp.10000</option>
                            <option value="15000">Rp.15000</option>
                            <option value="20000">Rp.20000</option>
                        </select>
                    </div>
                    <div class="wrapper-last-item">
                        <label for="total_bayar">Total Bayar :</label>
                        <input type="text" name="total_bayar" id="total_bayar" class="noborder" readonly required>
                    </div>
                    <div class="wrapper-last-item">
                        <button type="submit" class="simpan-button">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="/js/scriptCustomer.js"></script>
    <script src="/js/scriptBarang.js"></script>
    <script src="/js/scriptStyling.js"></script>

@endsection