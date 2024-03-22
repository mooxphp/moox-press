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
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): ?string
    {
        if (str_contains($uri, '/wp/') || str_ends_with($uri, '/wp')) {

            if (str_contains($uri, '/wp-admin')) {

                if (str_ends_with($uri, '/wp-admin/') || str_ends_with($uri, '/wp-admin') || str_ends_with($uri, '/wp-admin/index.php')) {
                    return $sitePath.'/public/wp/wp-admin/index.php';
                }

                return $sitePath.'/public'.$uri;
            }

            if (str_contains($uri, 'wp-login.php')) {
                return $sitePath.'/public/wp/wp-login.php';
            }

            return $sitePath.'/public/wp/index.php';
        }

        return $sitePath.'/public/index.php';
    }
}
