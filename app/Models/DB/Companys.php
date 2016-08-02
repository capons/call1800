<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Companys extends Model
{
    protected $table = 'companys';
    protected $fillable = ['name', 'description', 'category', 'web-number', 'number']; //database table row name
}
