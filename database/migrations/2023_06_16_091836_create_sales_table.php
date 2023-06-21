<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sales_joint', function (Blueprint $table) {
            $table->id('sales_joint_id');
            $table->foreignId('sales_id');
            $table->foreignId('barang_id');
            $table->integer('quantity');
            $table->decimal('harga_setelah_diskon',30,2,true);
            $table->decimal('diskon_persen',30,2,true);
            $table->decimal('diskon_nilai',30,2,true);
            $table->decimal('diskon_coupon',30,2,true);
            $table->decimal('total_harga_barang',30,2,true);
            $table->decimal('subtotal',30,2,true);
            $table->decimal('ongkir',30,2,true);
            $table->decimal('total_bayar',30,2,true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
