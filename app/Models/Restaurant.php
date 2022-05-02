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
    protected $fillable = ['name','slug','slogan','image','mobile','email','owner','password','status','ownerImage','established_at','region',
        'physical_distancing','safety_cleaning', 'map_link','map_address','neighborhood','hours_of_operation','parking_details','payment_system','payment_option',
        'additional','website','catering','facebook_url','twitter_url','pinterest_url','linkedin_url','description'];
}
