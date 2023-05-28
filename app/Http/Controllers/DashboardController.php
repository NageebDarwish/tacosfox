<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // Show Menu
    public function index()
    {
        $menus = Menu::latest('id')->take(5)->get();
        $meals = Menu::with('meals')->latest('id')->take(2)->get();
        return view('dashboard', compact('menus', 'meals'));
    }
}
