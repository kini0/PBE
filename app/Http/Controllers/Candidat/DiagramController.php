<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiagramController extends Controller
{
    //
    public function diagram()
    {
        return view('/candidats.diagram');
    }
}
