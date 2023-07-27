
   
   <div class="navbar-container">
        <div class="navbar-wrapper">
            <div> </div>
            <a href="/" class="navbar-button {{ request()->is('/') ? 'active' : ''}}">Home</a>
            <a href="/order" class="navbar-button {{ request()->is('order') ? 'active' : ''}}">Order</a>
            <a href="/transaksi" class="navbar-button {{ request()->is('transaksi') ? 'active' : ''}}">Transaksi</a>
        </div>
    </div>

   