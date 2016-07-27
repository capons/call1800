<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['name', 'description', 'category', 'number','web-number']; //database table row name
}
