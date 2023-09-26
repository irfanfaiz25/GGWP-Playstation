<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use App\Models\Income;
use App\Models\Television;
use App\Models\Transaction;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        session()->flash('doneKembalian', false);
        return view('dashboard.transaction', [
            'page' => 'Transactions',
            'trans_id' => '',
            'transactions' => Transaction::all(),
            'foods' => Menu::where('jenis', 'makanan')
                ->get(),
            'drinks' => Menu::where('jenis', 'minuman')
                ->get(),
            'users' => Transaction::where('user', '!=', '')
                ->get(),
            'additionals' => Calculation::all()
                ->where('tv_id', '!=', '0')
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
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function updateStartPlay(Request $request)
    {
        $jam_mulai = date("Y-m-d ") . $request->jam_mulai;

        if ($request->get('id')) {
            $transaction = Transaction::find($request->get('id'));
            $transaction->update([
                'user' => $request->user,
                'jam_mulai' => $jam_mulai
            ]);
        }

        return redirect('/dashboard/transaction');
    }

    public function updateEndPlay(Request $request)
    {
        $custom_function = new CustomFunctionsController();

        if ($request->get('id')) {
            $transaction = Transaction::find($request->get('id'));
            $tarif = $transaction->tarif;
            $jam_mulai = $transaction->jam_mulai;
            $jam_selesai = \Carbon\Carbon::now()
                ->format('Y-m-d H:i');
            $lama_main = \Carbon\Carbon::parse($jam_mulai)
                ->diffInMinutes(\Carbon\Carbon::parse($jam_selesai));
            $total_ps = intval($lama_main * ($tarif / 60));
            $total_tambahan = Calculation::where('tv_id', $request->get('id'))
                ->sum('total');
            $total = ($total_ps + $total_tambahan);

            $transaction->update([
                'jam_selesai' => $jam_selesai,
                'lama_main' => $custom_function->minutesToHours($lama_main),
                'total_harga' => $total
            ]);

            return view('dashboard.transaction', [
                'trans_id' => $request
                    ->get('id'),
                'trans_total_rent' => $custom_function->rupiahFormat($total_ps),
                'trans_total_tambahan' => $custom_function->rupiahFormat($total_tambahan),
                'trans_jam_mulai' => $jam_mulai,
                'trans_jam_selesai' => $jam_selesai,
                'trans_user' => $transaction->user,
                'trans_lama_main' => $custom_function
                    ->minutesToHours($lama_main),
                'trans_total' => $custom_function->rupiahFormat($total),
                'page' => 'Transaction',
                'transactions' => Transaction::all(),
                'menus' => Menu::all(),
                'foods' => Menu::where('jenis', 'makanan')
                    ->get(),
                'drinks' => Menu::where('jenis', 'minuman')
                    ->get(),
                'users' => Transaction::where('user', '!=', '')
                    ->get(),
                'additionals' => Calculation::all()
                    ->where('tv_id', '!=', '0')
                    ->sortByDesc('created_at')
            ]);
        }
    }

    public function paymentUpdate(Request $request)
    {
        $custom_function = new CustomFunctionsController();

        if ($request->get('tv_id')) {

            $tv_id = $request->get('tv_id');
            $user = $request->user;
            $lama_main = $request->lama_main;
            $total_rent = $request->total_rent;
            $total = $request->total;
            $dibayar = $request->dibayar;
            $total_tambahan = $request->total_tambahan;
            $transaction = Transaction::find($tv_id);
            $jam_mulai = $transaction->jam_mulai;
            $jam_selesai = $transaction->jam_selesai;

            $numericString = preg_replace('/[^0-9-]/', '', $total);
            $numericStringRent = preg_replace('/[^0-9-]/', '', $total_rent);
            $numericStringDibayar = preg_replace('/[^0-9-]/', '', $dibayar);
            $numericStringTambahan = preg_replace('/[^0-9-]/', '', $total_tambahan);

            $int_value_total = (int) $numericString;
            $int_value_rent = (int) $numericStringRent;
            $int_value_total_tambahan = (int) $numericStringTambahan;
            $int_value_dibayar = (int) $numericStringDibayar;

            $kembalian = ($int_value_dibayar - $int_value_total);

            if ($kembalian < 0) {
                return redirect('/dashboard/transaction')
                    ->with('error', 'Uang yang dibayarkan kurang.')
                    ->with('trans_id', $tv_id)
                    ->withInput();
            } else {
                Income::create([
                    'tv_id' => $tv_id,
                    'user' => $user,
                    'jam_mulai' => $jam_mulai,
                    'jam_selesai' => $jam_selesai,
                    'lama_main' => $lama_main,
                    'total_rent' => $int_value_rent,
                    'total_tambahan' => $int_value_total_tambahan,
                    'ket' => 'Rental',
                    'total' => $int_value_total
                ]);

                $transaction->update([
                    'user' => NULL,
                    'jam_mulai' => '00:00',
                    'jam_selesai' => '00:00',
                    'lama_main' => NULL,
                    'total_harga' => 0
                ]);

                Calculation::where('tv_id', $tv_id)->delete();

                return view('dashboard.transaction', [
                    'page' => 'Transactions',
                    'trans_id' => '',
                    'kembalian' => 'Rp. ' . $custom_function->rupiahFormat($kembalian),
                    'transactions' => Transaction::all(),
                    'foods' => Menu::where('jenis', 'makanan')
                        ->get(),
                    'drinks' => Menu::where('jenis', 'minuman')
                        ->get(),
                    'users' => Transaction::where('user', '!=', '')
                        ->get(),
                    'additionals' => Calculation::all()
                        ->where('tv_id', '!=', '0')
                ])->with(session()->flash('doneKembalian', true));
            }
        }
    }

    public function menuTambahan(Request $request)
    {
        $selectedItems = $request->input('items', []);
        $pembeli = $request->pembeli;

        foreach ($selectedItems as $itemId => $data) {
            if (isset($data["nama_menu"]) && isset($pembeli) && $pembeli != '0' && isset($data["jumlah"])) {
                $idTv = $pembeli;
                $namaMenu = $data["nama_menu"];
                $jumlahItem = $data["jumlah"];
                $harga = $data["harga"];
                $total = $harga * $jumlahItem;

                Calculation::create([
                    'tv_id' => $idTv,
                    'nama_menu' => $namaMenu,
                    'jumlah' => $jumlahItem,
                    'harga' => $harga,
                    'total' => $total
                ]);
            } elseif (isset($data["nama_menu"]) && isset($pembeli) && $pembeli == '0' && isset($data["jumlah"])) {
                $namaMenu = $data["nama_menu"];
                $jumlahItem = $data["jumlah"];
                $harga = $data["harga"];
                $total = $harga * $jumlahItem;

                Income::create([
                    'ket' => 'Angkringan',
                    'nama_menu' => $namaMenu,
                    'harga_menu' => $harga,
                    'jumlah' => $jumlahItem,
                    'total' => $total
                ]);
            }
        }

        return redirect('/dashboard/transaction');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }


}