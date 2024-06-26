<?php

namespace App\Providers;

use App\Repositories\Championship\ChampionshipEloquentORM;
use App\Repositories\Championship\ChampionshipRepositoryInterface;
use App\Repositories\Matches\{MatchesEloquentORM, MatchesRepositoryInterface};
use App\Repositories\Team\{TeamEloquentORM, TeamRepositoryInterface};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            TeamRepositoryInterface::class,
            TeamEloquentORM::class
        );
        $this->app->bind(
            MatchesRepositoryInterface::class,
            MatchesEloquentORM::class
        );
        $this->app->bind(
            ChampionshipRepositoryInterface::class,
            ChampionshipEloquentORM::class
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
