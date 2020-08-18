<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table='orders';
    protected $fillable=['name','number','product_id','n_o_p','created_at','updated_at'];
    public function products()
    {
        return $this->hasMany('App\products');
    }
    //
}
