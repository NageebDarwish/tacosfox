<?php

namespace App\Http\Controllers;

use App\Models\ArabicMeal;
use App\Models\ArabicMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArabicMealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus = ArabicMenu::with('arabicmeals')->orderBy('id')->paginate(5);

        return view('meals.ar.index', compact('menus'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = ArabicMenu::all();
        return view('meals.ar.add', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meal = new ArabicMeal();
        $request->validate([
            'title' => 'required',
        ]);
        $meal->menu_id = $request->menu_id;
        $meal->title = $request->title;
        $meal->description = $request->description;
        $meal->currency = $request->currency;
        $meal->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'images';
            $file->move($path, $filename);
            $meal->image = url('/') . '/images/' . $filename;
        }
        $meal->save();
        return redirect('/dashboard-ar/meal');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArabicMeal $meal)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $meal = ArabicMeal::findOrFail($id);
        $menus = ArabicMenu::all();
        return view('meals.ar.edit', compact('meal', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $meal = ArabicMeal::findOrFail($id);
        $request->validate([
            'title' => 'required',
        ]);
        $meal->menu_id = $request->menu_id;
        $meal->title = $request->title;
        $meal->title = $request->title;
        $meal->description = $request->description;
        $meal->currency = $request->currency;
        $meal->price = $request->price;
        if ($request->hasFile('image')) {
            $oldpath = public_path() . '/images/' . substr($meal['image'], strrpos($meal['image'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $meal->image = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }
        $meal->save();
        return redirect('/dashboard-ar/meal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meal = ArabicMeal::findOrFail($id);
        $path = public_path() . '/images/' . substr($meal['image'], strrpos($meal['image'], '/') + 1);
        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('arabic_meals')->where('id', '=', $id)->delete();
        return redirect('/dashboard-ar/meal');
    }
}
