<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    //la facture
    public function index()
    {
        return view('candidats/facture');
    }

    public function print()
    {
        return view('candidats/facture-print');
    }
}
