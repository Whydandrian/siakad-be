<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Router;

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
        // Set locale dari session dengan fallback ke config
        $locale = session('locale', config('app.locale', 'id'));
        
        if (in_array($locale, ['en', 'id'])) {
            app()->setLocale($locale);
            Log::info('Locale set to: ' . $locale);
        }

        // Auto-discover dan register middleware
        $this->autoDiscoverAndRegisterMiddlewares();
    }

    /**
     * Auto-discover dan langsung register middleware
     */
    protected function autoDiscoverAndRegisterMiddlewares(): void
    {
        $router = $this->app->make(Router::class);
        $modulesPath = app_path('Modules');
        
        if (!File::exists($modulesPath)) {
            return;
        }

        $modules = File::directories($modulesPath);
        
        foreach ($modules as $modulePath) {
            $moduleName = basename($modulePath);
            $middlewarePath = $modulePath . '/Http/Middleware';
            
            if (File::exists($middlewarePath)) {
                $middlewareFiles = File::files($middlewarePath);
                
                foreach ($middlewareFiles as $file) {
                    $className = $file->getFilenameWithoutExtension();
                    $namespace = "App\\Modules\\{$moduleName}\\Http\\Middleware\\{$className}";
                    
                    if (class_exists($namespace)) {
                        $alias = strtolower($moduleName) . '.' . strtolower($className);
                        
                        // Langsung register ke router
                        $router->aliasMiddleware($alias, $namespace);
                        
                        Log::info("Registered middleware: {$alias} -> {$namespace}");
                    }
                }
            }
        }

    }
}
