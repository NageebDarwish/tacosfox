<?php

namespace App\Http\Controllers;

use App\Models\Meals;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MealsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $menus = Menu::with('meals')->orderBy('id')->paginate(5);

        return view('meals.en.index', compact('menus'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::all();
        return view('meals.en.add', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $meal = new Meals();
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
        return redirect('/meals');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meals $meal)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $meal = Meals::findOrFail($id);
        $menus = Menu::all();
        return view('meals.en.edit', compact('meal', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $meal = Meals::findOrFail($id);
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
        return redirect('/meals');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $meal = Meals::findOrFail($id);
        $path = public_path() . '/images/' . substr($meal['image'], strrpos($meal['image'], '/') + 1);
        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('meals')->where('id', '=', $id)->delete();
        return redirect('/meals');
    }
}
