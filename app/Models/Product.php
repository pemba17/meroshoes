<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps=false;

    public $guarded=[];


    public function photo()
    {
    	return $this->hasMany('App\Models\Photo');
    }
}

