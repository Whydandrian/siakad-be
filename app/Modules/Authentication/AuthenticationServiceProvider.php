<?php

namespace App\Modules\Authentication;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ViewErrorBag;

class AuthenticationServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Authentication';
    protected string $moduleNameLower = 'authentication';

    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
        $this->registerConfig();
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
        $this->registerViewComposers();
    }

    /**
     * Register view composers untuk memastikan $errors selalu tersedia
     */
    protected function registerViewComposers(): void
    {
        View::composer('authentication::*', function ($view) {
            if (!$view->offsetExists('errors')) {
                $view->with('errors', session('errors', new ViewErrorBag()));
            }
        });
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
            $sourcePath => $viewPath,
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     */
    protected function registerTranslations(): void
    {
        $langPath = __DIR__ . '/Config/lang';

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        }
    }

    /**
     * Register repositories.
     */
    protected function registerRepositories(): void
    {
        // Register your repositories here
    }

    /**
     * Register services.
     */
    protected function registerServices(): void
    {
        // Register your services here
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
    protected string $moduleNamespace = 'App\Modules\Authentication\Http\Controllers';
    protected string $moduleName = 'Authentication';
    protected string $moduleNameLower = 'authentication';

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