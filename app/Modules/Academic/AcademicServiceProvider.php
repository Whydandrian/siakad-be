<?php

namespace App\Modules\Academic;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class AcademicServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Academic';
    protected string $moduleNameLower = 'academic';

    /**
     * Register services.
     */
    public function register(): void
    {
        // Register module config
        $this->mergeConfigFrom(
            __DIR__ . '/Config/config.php',
            $this->moduleNameLower
        );
        
        // Register repositories and services
        $this->registerRepositories();
        $this->registerServices();
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerRoutes(); // <- TAMBAHKAN INI
    }

    /**
     * Register routes.
     */
    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([
            __DIR__ . '/Config/config.php' => config_path($this->moduleNameLower . '.php'),
        ], 'config');
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);
        $sourcePath = __DIR__ . '/Presenters';

        $this->publishes([

        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(__DIR__ . '/Config/lang', $this->moduleNameLower);
        }
    }

    /**
     * Register repositories.
     */
    protected function registerRepositories(): void
    {
        // Register your repositories here
        // Example:
        // $this->app->bind(
        //     UserRepositoryInterface::class,
        //     UserRepository::class
        // );
    }

    /**
     * Register services.
     */
    protected function registerServices(): void
    {
        // Register your services here
        // Services are usually resolved automatically by Laravel's container
        // But you can bind interfaces to implementations here if needed
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }

        return $paths;
    }
}

class RouteServiceProvider extends ServiceProvider
{
    protected string $moduleNamespace = 'App\Modules\Academic\Http\Controllers';
    protected string $moduleName = 'Academic';
    protected string $moduleNameLower = 'academic';

    public function boot(): void
    {
        $this->map();
    }

    public function map(): void
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(__DIR__ . '/Routes/web.php');
    }

    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->moduleNamespace)
            ->group(__DIR__ . '/Routes/api.php');
    }
}