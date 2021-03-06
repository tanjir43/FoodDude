<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $fillable =['restaurant_id','menu_id','verity','status'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
    public  function food(){
        return $this->hasMany(Food::class);
    }
}
