<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Television;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.data-menu', [
            'page' => 'Data Menu',
            'menus' => Menu::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_menu' => 'required|max:100',
            'jenis' => 'required'
        ]);

        $numeric_string_harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $harga = (int) $numeric_string_harga;

        $data['harga'] = $harga;

        Menu::create($data);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nama_menu' => 'required|max:100',
            'jenis' => 'required'
        ]);

        $numeric_string_harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $harga = (int) $numeric_string_harga;

        $data['harga'] = $harga;

        Menu::where('id', $id)
            ->update($data);

        return redirect()->back()->with('success', 'Menu berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::destroy($id);

        return redirect('/dashboard/data-menu')->with('success', 'Menu berhasil dihapus.');
    }
}