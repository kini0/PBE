<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Charts $charts)
    {
        #candidats inscrit
        $charts->register([
            \App\Charts\SampleChart::class
        ]);

        #candidats Admis
        $charts->register([
            \App\Charts\AdmisChart::class
        ]);

        #candidats non retenu
        $charts->register([
            \App\Charts\NonretenuChart::class
        ]);

        #la moyenne générale dans candidats pas période
        $charts->register([
            \App\Charts\MoyenneChart::class
        ]);

        Paginator::useBootstrap();
       
    }
}
