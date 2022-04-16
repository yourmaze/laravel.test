<?php

namespace App\Providers;

use App\Repositories\CashBuyInsRepository;
use App\Repositories\CashGameRepository;
use App\Repositories\CashRakeRepository;
use App\Repositories\DealerRepository;
use App\Repositories\Interfaces\CashBuyInRepositoryInterface;
use App\Repositories\Interfaces\CashGameRepositoryInterface;
use App\Repositories\Interfaces\CashRakeRepositoryInterface;
use App\Repositories\Interfaces\DealerRepositoryInterface;
use App\Repositories\Interfaces\ProductRepository;
use App\Repositories\Interfaces\TempTournamentRepository;
use App\Repositories\Interfaces\TournamentPlayerInterface;
use App\Repositories\Interfaces\TournamentRepositoryInterface;
use App\Repositories\ProductOrmRepository;
use App\Repositories\TempTournamentCacheRepository;
use App\Repositories\TempTournamentOrmRepository;
use App\Repositories\TournamentPlayerRepository;
use App\Repositories\TournamentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ProductRepository::class,
            ProductOrmRepository::class);
    }
}
