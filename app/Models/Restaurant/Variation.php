<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $fillable =['menu_id','verity','status'];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
