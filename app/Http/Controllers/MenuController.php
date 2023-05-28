<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('id')->paginate(9);
        return view('menus.en.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.en.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $request->validate([
            'title' => 'required',
        ]);
        $menu->title = $request->title;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $path = 'images';
            $file->move($path, $filename);
            $menu->image = url('/') . '/images/' . $filename;
        }
        $menu->save();
        return redirect('/menus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.en.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);
        $request->validate([
            'title' => 'required',
        ]);
        $menu->title = $request->title;
        if ($request->hasFile('image')) {
            $oldpath = public_path() . '/images/' . substr($menu['image'], strrpos($menu['image'], '/') + 1);
            if (File::exists($oldpath)) {
                File::delete($oldpath);
            }
            $file = $request->file('image');
            $filename = date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $menu->image = url('/') . '/images/' . $filename;
            $path = 'images';
            $file->move($path, $filename);
        }
        $menu->save();
        return redirect('/menus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $path = public_path() . '/images/' . substr($menu['image'], strrpos($menu['image'], '/') + 1);
        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('menus')->where('id', '=', $id)->delete();
        return redirect('/menus');
    }
}
