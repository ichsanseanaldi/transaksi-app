@extends('main')

@section('child')

    <noscript>Turn on Javascript Please !</noscript>
    
    <div>

        <h1 class="m-10" style="text-align: center">Form Input</h1>

        @if ($errors->any())
            <div class="m-10 error-msg">
                @foreach ($errors->all() as $error)
                    <em>{{ $error }}</em>
                @endforeach
            </div>
        @endif
    
        <div class="section-wrapper m-20-ud">
            <button class="customer-popup toggle-button" onclick="toggleButton(event,'customer')">
                Pilih Customer :
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
                        <p>Nama : {{ $customer->nama_cust }}</p>   
                        <p>Kode : {{ $customer->kode_cust }}</p>    
                        <p>Telp : {{ $customer->telp_cust }}</p> 
                    </div>
                @endforeach
            </div>
            <div class="display m-10">
                <div class="user-display m-10"></div>
            </div>
        </div>  
        <div class="section-wrapper m-20-ud">
            <button class="barang-popup toggle-button" onclick="toggleButton(event,'barang')">
                Tambah Barang +
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
                            <p>Nama : {{ $barang->nama_barang }}</p>
                            <p>Kode : {{ $barang->kode_barang }}</p>
                            <p>Harga : Rp. {{ $barang->harga_barang }}</p>
                        </div>
                        <div class="input-group">
                            <label for="quantity">Quantity : </label>
                            <input type="number" name="quantity" id="quantity" placeholder="quantity" value="1" class="quantity-input" min="1" max="30">
                        </div>
                        <div class="input-group">
                            <label for="diskon-persen">Diskon : </label>
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
                <div class="m-10">
                    <label for="nomor_transaksi">No Transaksi:</label>
                    <input class="noborder" type="text" name="nomor_transaksi" id="nomor_transaksi" value={{ $date }}>
                </div>
                <div class="m-10">
                    <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="m-20-ud">
                </div>
                <div class="overflowed">
                    <ul class="responsive-table">
                        <li class="table-header">
                            <div class="col col-3">Nama</div>
                            <div class="col col-3">Kode</div>
                            <div class="col col-3">Harga</div>
                            <div class="col col-3">Quantity</div>
                            <div class="col col-3">Diskon %</div>
                            <div class="col col-3">Nilai Diskon</div>
                            <div class="col col-3">Harga Diskon</div>
                            <div class="col col-2">Total Harga</div>
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
                        <label for="total_bayar">Total Bayar:</label>
                        <input type="text" name="total_bayar" id="total_bayar" class="noborder" readonly required>
                    </div>
                    <input type="submit" value="Simpan" class="simpan-button">
                </div>
            </form>
        </div>
    </div>

    <script src="/js/scriptCustomer.js"></script>
    <script src="/js/scriptBarang.js"></script>
    <script src="/js/scriptStyling.js"></script>

@endsection