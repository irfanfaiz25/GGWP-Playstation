<?php

namespace App\Http\Controllers;

use App\Models\Television;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TelevisionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.data-tv', [
            'page' => 'Data TV',
            'televisions' => Television::all()
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
        $validatedData = $request->validate([
            'name' => 'required|max:50|unique:televisions',
            'tarif' => 'required'
        ]);

        $validatedDataTransaction = $request->validate([
            'name' => 'required|max:50|unique:transactions',
            'tarif' => 'required'
        ]);

        Television::create($validatedData);
        Transaction::create($validatedDataTransaction);

        return redirect('/dashboard/data-tv')->with('success', 'New data television has been added !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Television $television)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Television $television)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name' => 'required|max:50',
            'tarif' => 'required'
        ];

        $validatedData = $request->validate($data);

        Television::where('id', $id)
            ->update($validatedData);

        return redirect('/dashboard/data-tv')->with('success', 'Data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Television::destroy($id);

        return redirect('/dashboard/data-tv')->with('success', 'Data has been deleted !');
    }
}