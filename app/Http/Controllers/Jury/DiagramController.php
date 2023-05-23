<?php

namespace App\Http\Controllers\Jury;

//Use charts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Charts;
use App\Charts\SampleChart;
use App\Models\User;
use App\Models\Dossier;

class DiagramController extends Controller
{
    public function diagram(){

        
        
       
        
        return view('jurys.diagram');
    }
}
