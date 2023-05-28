<?php

namespace App\Http\Controllers;

use App\Models\ArabicMenu;
use Illuminate\Http\Request;

class ArabicDashboardController extends Controller
{
    // Show Menu
    public function index()
    {
        $menus = ArabicMenu::latest('id')->take(5)->get();
        $meals = ArabicMenu::with('arabicmeals')->latest('id')->take(2)->get();

        return view('dashboard-ar', compact('menus', 'meals'));
    }
}
