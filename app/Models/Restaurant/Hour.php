<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;
    protected $fillable = ['restaurant_id','hour','status',];

    public  function  table(){
        return $this->hasMany(Table::class);
    }

}
