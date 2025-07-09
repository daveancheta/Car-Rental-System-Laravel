<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Rent;

class ContractController extends Controller
{


    public function generateContract(Rent $rent)
{
    return view('contract', compact('rent'));
}

public function downloadContract(Rent $rent)
{
    $pdf = Pdf::loadView('contract_pdf', compact('rent'))
              ->setPaper('A4', 'portrait');

    return $pdf->download("Rental-Contract-{$rent->customer_first_name}-{$rent->customer_last_name}.pdf");
}
}
