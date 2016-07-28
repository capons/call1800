<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Prefix extends Model
{
    protected $table = 'prefix';
    protected $fillable = ['buytollfree_id', 'prefix']; //database table row name
}
