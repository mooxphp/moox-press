<?php

use Valet\Drivers\LaravelValetDriver;

class LocalValetDriver extends LaravelValetDriver
{
    /**
     * Determine if the driver serves the request.
     */
    public function serves(string $sitePath, string $siteName, string $uri): bool
    {
        return true;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     */
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): string
    {
        // WordPress admin or includes
        if (preg_match('#/wp/(wp-admin|wp-includes)#', $uri)) {
            return $sitePath.'/public/wp/index.php';
        }

        if (str_contains($uri, '/wp')) {
            // Handle WordPress front-end
            return $sitePath.'/public/wp/index.php';
        }

        // Fallback to Laravel's front controller
        return parent::frontControllerPath($sitePath, $siteName, $uri);

    }
}
