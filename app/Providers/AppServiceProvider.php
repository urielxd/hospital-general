<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Database\Query\Builder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        Builder::macro('past', function($column, $when = 'now', $strict = true) {
            $when = Carbon::parse($when);
            $operator = $strict ? '<' : '<=';
            return $this->where($column, $operator, $when);
        });

        Builder::macro('future', function($column, $when = 'now', $strict = true) {
            $when = Carbon::parse($when);
            $operator = $strict ? '>' : '>=';
            return $this->where($column, $operator, $when);
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
