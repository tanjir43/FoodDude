<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_id','date_id','hour','status',];


    public function date(){
        return $this->belongsTo(Date::class);
    }

    public  function  tables(){
        return $this->hasMany(Table::class);
    }
}
