<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'minutes',
        'instructions',
        'nutrition_values',
        'picture',
    ];

    // public function ingredients()
    // {
    //     return $this->hasMany(Ingredient::class);
    // }

    // public function nutritions()
    // {
    //     return $this->hasMany(Nutrition::class);
    // }

    // public function instructions()
    // {
    //     return $this->hasMany(Instruction::class);
    // }
}
