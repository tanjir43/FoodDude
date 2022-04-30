<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Role extends Authenticatable

{
    use HasApiTokens,HasFactory,Notifiable;
    protected $guard= ['admins'];
    protected $fillable = ['full_name','email','password','mobile','image','status','designation','facebook_url','twitter_url','pinterest_url','linkedin_url','bio','slug','role'];

}
