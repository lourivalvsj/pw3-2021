<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = ['description'];

    //relaciomento tabela  countries
    public function countries(){
        return $this->hasMany(Country::class);
    }
}
