<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicMenu extends Model
{
    use HasFactory;

    public function ArabicMeals()
    {
        return $this->hasMany(ArabicMeal::class, 'menu_id');
    }
}
