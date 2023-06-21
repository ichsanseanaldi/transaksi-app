<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['barang_id'];

    public function sales(): BelongsToMany
    {
        return $this->belongsToMany(Sales::class,'sales_joint_id','barang_id','sales_id')
                    ->withPivot(
                        'quantity', 
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
