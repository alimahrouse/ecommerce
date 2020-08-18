<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cats extends Model
{
    //
    protected $table='cats';
    protected $fillable=['name','code','photo','created_at','updated_at'];
    public function products()
    {
        return $this->hasMany('App\products','cat_id');
    }
}
