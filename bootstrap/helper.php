<?php

use Illuminate\Support\Str;

if (!function_exists('routeHome')) {

    /**
     * @return string
     */
    function routeHome()
    {
        return \App\Providers\RouteServiceProvider::HOME;
    }
}

if (!function_exists('generateRememberToken')) {

    /**
     * @return string
     * @throws Exception
     */
    function generateRememberToken()
    {
//        return bin2hex(random_bytes(32));
        return Str::random(60);
    }
}

if (!function_exists('generateVerificationHash')) {

    /**
     * @param string $userEmail
     * @return string
     */
    function generateVerificationHash($userEmail)
    {
        return sha1($userEmail);
    }
}

if (!function_exists('includeRouteFiles')) {

    /**
     * @param string $folder
     * @return void
     */
    function includeRouteFiles($folder)
    {
        try {
            $recursiveDirectoryIterator = new RecursiveDirectoryIterator($folder);
            $recursiveIteratorIterator = new RecursiveIteratorIterator($recursiveDirectoryIterator);

            while ($recursiveIteratorIterator->valid()) {
                if (!$recursiveIteratorIterator->isDot()
                    && $recursiveIteratorIterator->isFile()
                    && $recursiveIteratorIterator->isReadable()
                ) {
                    require $recursiveIteratorIterator->key();
                }

                $recursiveIteratorIterator->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
