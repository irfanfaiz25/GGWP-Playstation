<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today()->toDateString();

        return view('dashboard.data-finance', [
            'page' => 'Data Finance',
            // 'tabs' => 'ps',
            'rents' => Income::where('ket', 'Rental')
                ->whereDate('created_at', $today)->get(),
            'sales' => Income::where('ket', 'Angkringan')
                ->whereDate('created_at', $today)->get(),
            'expenditures' => Expenditure::whereDate('created_at', $today)->get(),
            'custom_function' => new CustomFunctionsController()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    public function updateIncomeAngkringan(Request $request, $id)
    {
        $nama_menu = $request->nama_menu;
        $jumlah = $request->jumlah;

        $num_harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $harga = (int) $num_harga;

        $total = ($harga * $jumlah);

        Income::find($id)
            ->update([
                'nama_menu' => $nama_menu,
                'harga_menu' => $harga,
                'jumlah' => $jumlah,
                'total' => $total
            ]);

        $return_value = [
            'success' => 'Data income angkringan berhasil diupdate.',
            'angkringan' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }

    public function updateIncomePs(Request $request, $id)
    {
        $user = $request->user;

        $num_total_ps = preg_replace('/[^0-9]/', '', $request->total_ps);
        $num_total_tambahan = preg_replace('/[^0-9]/', '', $request->total_tambahan);

        $total_ps = (int) $num_total_ps;
        $total_tambahan = (int) $num_total_tambahan;

        $total = ($total_ps + $total_tambahan);

        Income::find($id)
            ->update([
                'user' => $user,
                'total_rent' => $total_ps,
                'total_tambahan' => $total_tambahan,
                'total' => $total
            ]);

        $return_value = [
            'success' => 'Data income PS berhasil diupdate.',
            'ps' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function deleteIncomeAngkringan($id)
    {
        Income::destroy($id);

        $return_value = [
            'success' => 'Data income angkringan berhasil dihapus.',
            'angkringan' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }

    public function deleteIncomePs($id)
    {
        Income::destroy($id);

        $return_value = [
            'success' => 'Data income PS berhasil dihapus.',
            'ps' => true
        ];

        return redirect('/dashboard/data-finance')->with($return_value);
    }
}