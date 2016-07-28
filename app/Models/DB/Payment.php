<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';
    protected $fillable = ['buytollfree_id', 'payment_status', 'payment_type', 'price']; //database table row name
}
