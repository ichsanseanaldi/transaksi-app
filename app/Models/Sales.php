<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';

    protected $fillable = [
        'cust_id',
        'nomor_transaksi',
        'tanggal_transaksi'
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class,'cust_id','cust_id');
    }

    public function barang()
    {
        return $this->belongsToMany(Barang::class,'sales_joint_id','sales_id','barang_id')
                  ->withPivot('quantity', 
                                'harga_setelah_diskon',
                                'diskon_persen',
                                'diskon_nilai',
                                'diskon_coupon',
                                'total_harga_barang',
                                'subtotal',
                                'ongkir',
                                'total_bayar',
                                );
    }
}
