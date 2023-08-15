<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'user';


    public function cart()
    {
        return $this->hasMany(Cart::class, 'user_id');
    }

    public function CheckOut()
    {
        return $this->hasMany(CheckOut::class, 'user_id');
    }

    public function Pesanan(){
        return $this->hasMany(Pesanan::class, 'user_id');
    }
}
