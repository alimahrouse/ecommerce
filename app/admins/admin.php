<?php

namespace App\admins;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

//use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
    protected $table='admins';
    protected $fillable=['name','email','password','photo','created_at','updated_at'];
    protected $hidden=['password','remember_token'];
    //
}
