<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'synopsis', 'year', 'trailer', 'time', 'cover', 'country_id', 'genre_id', 'director_id'];

    public function director(){
        return $this->belongsTo(Director::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
