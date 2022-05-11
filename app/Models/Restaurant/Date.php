<?php

namespace App\Models\Restaurant;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;
    protected $fillable =['restaurant_id','date','status'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public  function  hours(){
        return $this->hasMany(Hour::class);
    }
    public  function  tables(){
        return $this->hasMany(Table::class);
    }
}
