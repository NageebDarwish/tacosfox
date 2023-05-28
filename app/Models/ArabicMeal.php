<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicMeal extends Model
{
    use HasFactory;

    public function ArabicMenu()
    {
        return $this->belongsTo(ArabicMeal::class);
    }
}
