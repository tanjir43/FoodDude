<?php

namespace App\Models\Restaurant;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected  $fillable = ['period','status'];

    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function variation(){
        return $this->hasMany(Variation::class);
    }
}
