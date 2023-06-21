<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesJoint extends Model
{
    use HasFactory;

    protected $table = 'sales_joint';

    protected $guarded = 'sales_joint_id';

}
