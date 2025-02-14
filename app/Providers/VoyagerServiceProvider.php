<?php

namespace App\Providers;

use App\Actions\ApproveAction;
use App\Actions\RejectAction;
use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;
class VoyagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        Voyager::addAction(ApproveAction::class);

        Voyager::addAction(RejectAction::class);


    }
}
