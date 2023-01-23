<?php

namespace App\Providers;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        $locale = session()->get('locale');
        echo session()->get('locale');
     
        try {
           
            $categories= Category::all();
        if ($locale == "es")
        { 
            $categories[0]->name="hola";
        }
        else if ($locale == "en"){
            $categories[0]->name="adios";
        }
            //$categories[0]->name="hola";
            View::share('categories',$categories);
        } catch(\Throwable $th) {
            dump("ALERT:Recuerda lanzar las migrations cuando acabes el clone");
        }
        Paginator::useBootstrapFive();
    }
}
