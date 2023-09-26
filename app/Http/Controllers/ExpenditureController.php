<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $jumlah = $request->jumlah;

        $num_harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $harga = (int) $num_harga;

        $total = ($harga * $jumlah);

        $validatedData = $request->validate([
            'tanggal' => 'required',
            'keperluan' => 'required|max:50',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        $validatedData['harga'] = $harga;
        $validatedData['total'] = $total;

        Expenditure::create($validatedData);

        $return_value = [
            'success' => 'Data pengeluaran berhasil ditambahkan.',
            'expend' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expenditure $expenditure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expenditure $expenditure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jumlah = $request->jumlah;

        $num_harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $harga = (int) $num_harga;

        $total = ($harga * $jumlah);

        $validatedData = $request->validate([
            'tanggal' => 'required',
            'keperluan' => 'required|max:50',
            'jumlah' => 'required',
            'keterangan' => 'nullable'
        ]);

        $validatedData['harga'] = $harga;
        $validatedData['total'] = $total;

        Expenditure::find($id)
            ->update($validatedData);

        $return_value = [
            'success' => 'Data pengeluaran berhasil dihapus.',
            'expend' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Expenditure::destroy($id);

        $return_value = [
            'success' => 'Data pengeluaran berhasil dihapus.',
            'expend' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }
}