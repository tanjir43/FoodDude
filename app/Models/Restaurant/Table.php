<?php

namespace App\Models\Restaurant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = ['restaurant_id', 'hour','image','name','slug','priority','status',];

    public function hour()
    {
        return $this->belongsTo(Hour::class);
    }
}
