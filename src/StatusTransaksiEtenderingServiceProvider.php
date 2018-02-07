<?php namespace Bantenprov\StatusTransaksiEtendering;

use Illuminate\Support\ServiceProvider;
use Bantenprov\StatusTransaksiEtendering\Console\Commands\StatusTransaksiEtenderingCommand;

/**
 * The StatusTransaksiEtenderingServiceProvider class
 *
 * @package Bantenprov\StatusTransaksiEtendering
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEtenderingServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // Bootstrap handles
        $this->routeHandle();
        $this->configHandle();
        $this->langHandle();
        $this->viewHandle();
        $this->assetHandle();
        $this->migrationHandle();
        $this->publicHandle();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('status-transaksi-e-tendering', function ($app) {
            return new StatusTransaksiEtendering;
        });

        $this->app->singleton('command.status-transaksi-e-tendering', function ($app) {
            return new StatusTransaksiEtenderingCommand;
        });

        $this->commands('command.status-transaksi-e-tendering');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'status-transaksi-e-tendering',
            'command.status-transaksi-e-tendering',
        ];
    }

    /**
     * Loading package routes
     *
     * @return void
     */
    protected function routeHandle()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');
    }

    /**
     * Loading and publishing package's config
     *
     * @return void
     */
    protected function configHandle()
    {
        $packageConfigPath = __DIR__.'/config/config.php';
        $appConfigPath     = config_path('status-transaksi-e-tendering.php');

        $this->mergeConfigFrom($packageConfigPath, 'status-transaksi-e-tendering');

        $this->publishes([
            $packageConfigPath => $appConfigPath,
        ], 'config');
    }

    /**
     * Loading and publishing package's translations
     *
     * @return void
     */
    protected function langHandle()
    {
        $packageTranslationsPath = __DIR__.'/resources/lang';

        $this->loadTranslationsFrom($packageTranslationsPath, 'status-transaksi-e-tendering');

        $this->publishes([
            $packageTranslationsPath => resource_path('lang/vendor/status-transaksi-e-tendering'),
        ], 'lang');
    }

    /**
     * Loading and publishing package's views
     *
     * @return void
     */
    protected function viewHandle()
    {
        $packageViewsPath = __DIR__.'/resources/views';

        $this->loadViewsFrom($packageViewsPath, 'status-transaksi-e-tendering');

        $this->publishes([
            $packageViewsPath => resource_path('views/vendor/status-transaksi-e-tendering'),
        ], 'views');
    }

    /**
     * Publishing package's assets (JavaScript, CSS, images...)
     *
     * @return void
     */
    protected function assetHandle()
    {
        $packageAssetsPath = __DIR__.'/resources/assets';

        $this->publishes([
            $packageAssetsPath => resource_path('assets'),
        ], 'status-transaksi-e-tendering-assets');
    }

    /**
     * Publishing package's migrations
     *
     * @return void
     */
    protected function migrationHandle()
    {
        $packageMigrationsPath = __DIR__.'/database/migrations';

        $this->loadMigrationsFrom($packageMigrationsPath);

        $this->publishes([
            $packageMigrationsPath => database_path('migrations')
        ], 'migrations');
    }

    public function publicHandle()
    {
        $packagePublicPath = __DIR__.'/public';

        $this->publishes([
            $packagePublicPath => base_path('public')
        ], 'status-transaksi-e-tendering-public');
    }
}
