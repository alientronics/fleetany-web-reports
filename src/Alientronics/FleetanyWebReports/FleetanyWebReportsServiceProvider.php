<?php

namespace Alientronics\FleetanyWebReports;

use Illuminate\Support\ServiceProvider;

/**
 * Class FleetanyWebReportsServiceProvider
 * @package Alientronics\FleetanyWebReports
 */
class FleetanyWebReportsServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function boot()
    {
        // Views
        $this->loadViewsFrom(__DIR__ . '/../../views', 'fleetany-web-reports');

        // Routes
        include __DIR__.'/../../routes.php';
        
        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../../translations', 'fleetany-web-reports');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
