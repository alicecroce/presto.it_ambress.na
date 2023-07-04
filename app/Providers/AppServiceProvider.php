<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        AbstractPaginator::useBootstrapFive();

        if(Schema::hasTable('categories')){
            FacadesView::share('categories', Category::all());
        }
    }
}
