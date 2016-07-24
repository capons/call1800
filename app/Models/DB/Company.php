<?php

namespace App\Models\DB;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $fillable = ['name', 'number', 'address', 'city', 'state', 'country','zipcode']; //database table row name
}
