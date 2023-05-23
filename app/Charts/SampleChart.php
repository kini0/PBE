<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dossier;

class SampleChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     * $products = DB::table('products')
              *->whereYear('created_at', '2016')
              *->get();
     */
    public function handler(Request $request): Chartisan
    {
        
       
        $groups = DB::table('users')->select('year', DB::raw("count(*) as annee"))
                ->groupBy('year')
                ->pluck('annee', 'year')->all();
                       
        //trouver le moyen de formater le create_at en année
        
        return Chartisan::build()
            ->labels(array_keys($groups))
            ->dataset('Sample', array_values($groups));
    }
}