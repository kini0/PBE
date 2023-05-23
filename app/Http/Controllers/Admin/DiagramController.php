<?php

namespace App\Http\Controllers\Admin;

Use charts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dossier;


class DiagramController extends Controller
{
    //
    public function diagram(){
        /**
       * $users = User::select(\DB::raw("COUNT(*) as count"))
         *   ->whereYear('created_at', date('Y'))
         *   ->groupBy(\DB::raw("Month(created_at)"))
          *  ->pluck('count');
          *whereYear('created_at', '=', date('Y'));

        *$chart = new CandidatChart;
        *$chart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        *$chart->dataset('Tableau de registre des nouveaux utilisateurs', 'line', $users)->options([
        *    'fill' => 'true',
        *    'borderColor' => '#51C1C0'
        *]);
 */

        return view('/admins.diagram');
    }
}
