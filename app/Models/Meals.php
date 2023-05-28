<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meals extends Model
{
    use HasFactory;

    public function Menus()
    {
        return $this->belongsTo(Menu::class);
    }
}
