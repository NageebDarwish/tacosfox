<?php

namespace App\Http\Controllers;

use App\Models\ArabicMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ArabicMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = ArabicMenu::orderBy('id')->paginate(9);
        return view('menus.ar.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menus.ar.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new ArabicMenu();
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
        return redirect('/dashboard-ar/menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArabicMenu $menu)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = ArabicMenu::findOrFail($id);
        return view('menus.ar.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $menu = ArabicMenu::findOrFail($id);
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
        return redirect('/dashboard-ar/menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = ArabicMenu::findOrFail($id);
        $path = public_path() . '/images/' . substr($menu['image'], strrpos($menu['image'], '/') + 1);
        if (File::exists($path)) {
            File::delete($path);
        }
        DB::table('arabic_menus')->where('id', '=', $id)->delete();
        return redirect('/dashboard-ar/menu');
    }
}
