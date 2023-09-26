<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;

class SearchPurchaseController extends Controller
{

    public function index()
    {
        return view('dashboard.transaction');
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            $products = Calculation::whereHas('MenuPurchase', function ($query) use ($request) {
                $query->where('user', 'LIKE', '%' . $request->input('search') . '%')
                    ->orWhere('nama_menu', 'LIKE', '%' . $request->input('search') . '%');
            })->get();
            if ($products) {
                $no = 1;
                foreach ($products as $key => $product) {
                    $output .= '<tr>' .
                        '<td>' . $no . '</td>' .
                        '<td>' . $product->MenuPurchase->user . '</td>' .
                        '<td>' . $product->nama_menu . '</td>' .
                        '<td>' . 'Rp. ' . number_format($product->harga) . '</td>' .
                        '<td>' . $product->jumlah . '</td>' .
                        '<td>' . 'Rp. ' . number_format($product->total) . '</td>' .
                        '<td>' . '<a href="" class="btn btn-danger btn-sm"><i
                        class="fa fa-trash"></i>
                </a>' . '</td>' .
                        '</tr>';
                    $no++;
                }
                return Response($output);
            }
        }
    }
}