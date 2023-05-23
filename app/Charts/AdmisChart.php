<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Dossier;

class AdmisChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $groups = DB::table('users')->select('year', DB::raw("count(*) as annee"))
        ->groupBy('year')
        ->pluck('annee', 'year')->all();

        return Chartisan::build()
            ->labels(array_keys($groups))
            ->dataset('Sample 2', [3, 2, 1]);
    }
}