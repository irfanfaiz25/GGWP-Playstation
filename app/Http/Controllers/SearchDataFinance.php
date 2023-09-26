<?php

namespace App\Http\Controllers;

use App\Models\Expenditure;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchDataFinance extends Controller
{
    public function index()
    {
        return view('dashboard.data-finance');
    }

    public function fetchDataIncomePs(Request $request)
    {
        $custom_function = new CustomFunctionsController;
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        if ($request->ajax()) {
            $output = "";
            // $search_time = Carbon::today()->toDateString();
            $time = $request->input('time_search');
            if ($time == "today") {
                $search_time = Carbon::today()->toDateString();

                $items = Income::whereDate('created_at', $search_time)
                    ->whereHas('financeDataTVName', function ($query) use ($request) {
                        $query->where('user', 'LIKE', '%' . $request->input('search') . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->input('search') . '%');
                    })->get();
            } elseif ($time == "yesterday") {
                $search_time = Carbon::yesterday()->toDateString();

                $items = Income::whereDate('created_at', $search_time)
                    ->whereHas('financeDataTVName', function ($query) use ($request) {
                        $query->where('user', 'LIKE', '%' . $request->input('search') . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->input('search') . '%');
                    })->get();
            } elseif ($time == "week") {
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();

                $items = Income::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->whereHas('financeDataTVName', function ($query) use ($request) {
                        $query->where('user', 'LIKE', '%' . $request->input('search') . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->input('search') . '%');
                    })->get();
            } elseif ($time == "month") {
                $currentMonth = Carbon::now()->month;
                $currentYear = Carbon::now()->year;

                $items = Income::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $currentMonth)
                    ->whereHas('financeDataTVName', function ($query) use ($request) {
                        $query->where('user', 'LIKE', '%' . $request->input('search') . '%')
                            ->orWhere('name', 'LIKE', '%' . $request->input('search') . '%');
                    })->get();
            }

            if ($items) {
                $no = 1;
                foreach ($items as $key => $item) {
                    $output .= '<tr height="40">' .
                        '<td>' . $no . '</td>' .
                        '<td>' . $item->financeDataTVName->name . '</td>' .
                        '<td>' . $item->user . '</td>' .
                        '<td>' . date('H:i | d-m-Y', strtotime($item->jam_mulai)) . '</td>' .
                        '<td>' . date('H:i | d-m-Y', strtotime($item->jam_selesai)) . '</td>' .
                        '<td>' . $item->lama_main . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->total_rent) . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->total_tambahan) . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->total) . '</td>' .
                        '<td>' . '<a type="button" class="badge bg-primary" id="btnEditPs"
                        data-id="' . $item->id . '" data-user="' . $item->user . '"
                        data-total-ps="' . $custom_function->rupiahFormat($item->total_rent) . '"
                        data-total-tambahan="' . $custom_function->rupiahFormat($item->total_tambahan) . '">
                        <i class="fa fa-pen-to-square ps-1"></i>
                    </a>
                    <a type="button" class="badge bg-danger" id="btnDeletePs"
                        data-id="' . $item->id . '">
                        <i class="fa fa-trash ps-1"></i>
                    </a>' . '</td>' .
                        '</tr>';
                    $no++;
                }
                return Response($output);
            }
        }
    }

    public function fetchDataIncomeAngkringan(Request $request)
    {
        $custom_function = new CustomFunctionsController;
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        if ($request->ajax()) {
            $output = "";
            // $search_time = Carbon::today()->toDateString();
            $time = $request->input('time_search');
            if ($time == "today") {
                $search_time = Carbon::today()->toDateString();

                $items = Income::whereDate('created_at', $search_time)
                    ->where('nama_menu', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "yesterday") {
                $search_time = Carbon::yesterday()->toDateString();

                $items = Income::whereDate('created_at', $search_time)
                    ->where('nama_menu', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "week") {
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();

                $items = Income::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->where('nama_menu', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "month") {
                $currentMonth = Carbon::now()->month;
                $currentYear = Carbon::now()->year;

                $items = Income::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $currentMonth)
                    ->where('nama_menu', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            }

            if ($items) {
                $no = 1;
                foreach ($items as $key => $item) {
                    $output .= '<tr height="40">' .
                        '<td>' . $no . '</td>' .
                        '<td>' . $item->nama_menu . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->harga_menu) . '</td>' .
                        '<td>' . $item->jumlah . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->total) . '</td>' .
                        '<td>' . '<a type="button" class="badge bg-primary" id="btnEditAngkringan"
                        data-id="' . $item->id . '" data-nama-menu="' . $item->nama_menu . '"
                        data-harga="' . $custom_function->rupiahFormat($item->harga_menu) . '"
                        data-jumlah="' . $item->jumlah . '">
                        <i class="fa fa-pen-to-square ps-1"></i>
                    </a>
                    <a type="button" class="badge bg-danger" id="btnDeleteAngkringan"
                        data-id="' . $item->id . '">
                        <i class="fa fa-trash ps-1"></i>
                    </a>' . '</td>' .
                        '</tr>';
                    $no++;
                }
                return Response($output);
            }
        }
    }

    public function fetchDataExpend(Request $request)
    {
        $custom_function = new CustomFunctionsController;
        Carbon::setWeekStartsAt(Carbon::MONDAY);
        Carbon::setWeekEndsAt(Carbon::SUNDAY);

        if ($request->ajax()) {
            $output = "";
            // $search_time = Carbon::today()->toDateString();
            $time = $request->input('time_search');
            if ($time == "today") {
                $search_time = Carbon::today()->toDateString();

                $items = Expenditure::whereDate('created_at', $search_time)
                    ->where('keperluan', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "yesterday") {
                $search_time = Carbon::yesterday()->toDateString();

                $items = Expenditure::whereDate('created_at', $search_time)
                    ->where('keperluan', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "week") {
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();

                $items = Expenditure::whereBetween('created_at', [$startOfWeek, $endOfWeek])
                    ->where('keperluan', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            } elseif ($time == "month") {
                $currentMonth = Carbon::now()->month;
                $currentYear = Carbon::now()->year;

                $items = Expenditure::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $currentMonth)
                    ->where('keperluan', 'LIKE', '%' . $request->input('search') . '%')
                    ->get();
            }

            if ($items) {
                $no = 1;
                foreach ($items as $key => $item) {
                    $output .= '<tr height="40">' .
                        '<td>' . $no . '</td>' .
                        '<td>' . $item->tanggal . '</td>' .
                        '<td>' . $item->keperluan . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->harga) . '</td>' .
                        '<td>' . $item->jumlah . '</td>' .
                        '<td>' . 'Rp. ' . number_format($item->total) . '</td>' .
                        '<td>' . $item->keterangan . '</td>' .
                        '<td>' . '<a type="button" class="badge bg-primary" id="editPengeluaran"
                        data-id="' . $item->id . '" data-tanggal="' . $item->tanggal . '"
                        data-keperluan="' . $item->keperluan . '"
                        data-harga="' . $custom_function->rupiahFormat($item->harga) . '"
                        data-jumlah="' . $item->jumlah . '"
                        data-ket="' . $item->keterangan . '">
                        <i class="fa fa-pen-to-square ps-1"></i>
                    </a>
                    <a type="button" class="badge bg-danger" id="deletePengeluaran"
                        data-id="' . $item->id . '">
                        <i class="fa fa-trash ps-1"></i>
                    </a>' . '</td>' .
                        '</tr>';
                    $no++;
                }
                return Response($output);
            }
        }
    }

}