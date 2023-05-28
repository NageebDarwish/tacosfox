<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Models\Menu;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // Home Page
    public function homePage()
    {
        $menus = Menu::all();
        return view('home', compact('menus'));
    }

    // Menu Page
    public function menuPage(Request $request)
    {
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $menus = Menu::all();
            $meals = Menu::where('title', 'LIKE', '%' . $searchQuery . '%')->get();
            if ($meals->isEmpty()) {
                $meals = Meals::all();
                $menuTitle = 'All Menus';
            } else {
                $menuTitle = $meals[0]->title;
                $meals = $meals->flatMap(function ($menu) {
                    return $menu->meals;
                });
            }
        } else {
            $menuTitle = 'All Menus';
            $menus = Menu::all();
            $meals = Meals::all();
        }

        return view('menu', compact('menus', 'meals', 'menuTitle'));
    }

    // Contact Page
    public function contactPage()
    {
        return view('contact');
    }

    // Gallery Page
    public function galleryPage()
    {
        return view('gallery');
    }
}
