<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Buytollfree extends Model
{
    protected $table = 'buytollfree';
    protected $fillable = ['user_id', 'prefix_id', 'plan_type', 'month_count','minute']; //database table row name
}
