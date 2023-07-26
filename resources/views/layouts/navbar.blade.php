
   
   <div class="navbar-container">
        <div class="navbar-wrapper">
            <div> </div>
            <a href="/" class="navbar-button {{ request()->is('/') ? 'active' : ''}}">Home</a>
            <a href="/form" class="navbar-button {{ request()->is('form') ? 'active' : ''}}">Order</a>
            <a href="/history" class="navbar-button {{ request()->is('history') ? 'active' : ''}}">Transaksi</a>
        </div>
    </div>

   