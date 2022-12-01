<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function scopefindBooks($query, $find) {
        if($find) {
            return $query->where('pavadinimas','like',"%$find%");
        } else {
            return $query;
        }
    }
}
