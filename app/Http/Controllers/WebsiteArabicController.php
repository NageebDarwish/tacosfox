<?php

namespace App\Http\Controllers;

use App\Models\ArabicMenu;
use Illuminate\Http\Request;

class WebsiteArabicController extends Controller
{
    // Home Page
    public function homePage()
    {
        $menus = ArabicMenu::all();
        return view('arabicHome', compact('menus'));
    }

    // Menu Page
    public function menuPage(Request $request)
    {
        $searchQuery = $request->input('search');
        if ($searchQuery) {
            $menus = ArabicMenu::all();
            $meals = ArabicMenu::where('title', 'LIKE', '%' . $searchQuery . '%')->get();
            if ($meals->isEmpty()) {
                $meals = ArabicMenu::all();
                $menuTitle = 'كل المنيوهات';
            } else {
                $menuTitle = $meals[0]->title;
                $meals = $meals->flatMap(function ($menu) {
                    return $menu->meals;
                });
            }
        } else {
            $menuTitle = 'كل المنيوهات';
            $menus = ArabicMenu::all();
            $meals = ArabicMenu::all();
        }

        return view('ArabicMenu', compact('menus', 'meals', 'menuTitle'));
    }

    // Contact Page
    public function contactPage()
    {
        return view('ArabicContact');
    }

    // Gallery Page
    public function galleryPage()
    {
        return view('arabicGallery');
    }
}
