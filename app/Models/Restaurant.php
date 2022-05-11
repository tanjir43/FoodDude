<?php

namespace App\Models;
use App\Models\Restaurant\Date;
use App\Models\Restaurant\Hour;
use App\Models\Restaurant\Menu;
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
        'booking_price','additional','website','catering','facebook_url','twitter_url','pinterest_url','linkedin_url','description','dimension_view'];

    public  function  menu(){
        return $this->hasMany(Menu::class);
    }
    public  function  dates(){
        return $this->hasMany(Date::class);
    }

//    public  function  hours(){
//        return $this->hasMany(Hour::class);
//    }





//
//    public function gethours($request){
//        $hour     = $request->input('time');
//        $fhour = substr($hour, 0, 2);
//        $hours = Hour::where('hour','LIKE',"%$fhour%")->get();
//        return $hours;
//    }
}

