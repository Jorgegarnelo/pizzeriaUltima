<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['nombre'];
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class);
    }
}
