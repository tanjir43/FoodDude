<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Restaurant extends Authenticatable

{
    use HasApiTokens,HasFactory,Notifiable;

    protected $guard    = 'restaurants';
    protected $fillable = ['name','slug','slogan','image','mobile','email','owner','password','status'];
}
