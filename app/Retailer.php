<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    protected $fillable = [
        'name', 'logo', 'description', 'website', 
    ];
}
