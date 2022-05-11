<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id','date_id','hour_id','image','name','slug','priority','status',];

    public function hour()
    {
        return $this->belongsTo(Hour::class);
    }
    public function date()
    {
        return $this->belongsTo(Date::class);
    }
}
