<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    //

    public function hapusOrder($id)
    {
        Calculation::destroy($id);

        return redirect('/dashboard/transaction');
    }
}