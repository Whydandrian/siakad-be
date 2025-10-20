<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait GlobalServiceProviderTrait
{
    protected function registerRepositoriesFrom(string $moduleName): void
    {
        $basePath = app_path("Modules/{$moduleName}/Repositories");

        foreach (File::allFiles($basePath) as $file) {
            $path = $file->getPathname();

            if (str_ends_with($path, 'Interface.php')) {
                $relativePath = str_replace($basePath . '/', '', $path);
                $relativeNamespace = str_replace(['/', '.php'], ['\\', ''], $relativePath);

                $interface = "App\\Modules\\{$moduleName}\\Repositories\\{$relativeNamespace}";
                $repository = str_replace('Interface', 'Repository', $interface);

                if (interface_exists($interface) && class_exists($repository)) {
                    $this->app->bind($interface, $repository);
                }
            }
        }
    }
}