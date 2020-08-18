<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table='products';
    protected $fillable=['name','price','photo','number','orders_id','cat_id','created_at','updated_at'];
    //
    public function orders()
    {
        return $this->belongsTo('App\orders');
    }
    public function cats()
    {
        return $this->belongsTo('App\cats','cat_id');
    }
}
