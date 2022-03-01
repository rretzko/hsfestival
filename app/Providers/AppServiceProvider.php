<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        /* UNCOMMENT the following to create a query trace/timing log */
        /** @cite https://laravel.io/articles/how-to-find-the-slowest-query-in-your-application */
        /*
        DB::listen(function($query){
            $location = collect(debug_backtrace())->filter(function($trace){
                return !str_contains($trace['file'], 'vendor/');
            })->first();

            $bindings = implode(", ", $query->bindings);

            Log::info("
                -------------
                SQL: $query->sql
                Bindings: $bindings
                Time: $query->time
                File: ${location['file']}
                Line: ${location['line']}
                --------------
                ");
        });
*/
    }
}
