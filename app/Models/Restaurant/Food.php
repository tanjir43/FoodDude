<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected  $fillable = ['restaurant_id','menu_id','variation_id','name','price','description','nutrition','image','status'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }

}
