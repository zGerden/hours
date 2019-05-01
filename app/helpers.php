<?php

declare(strict_types=1);

use XdgBaseDir\Xdg;

/**
 * Get the home directory data path.
 *
 * @param  string $path
 * @return string
 */
function home_data_path($path = '')
{
    return (new Xdg())->getHomeDataDir().
        DIRECTORY_SEPARATOR.config('app.name').
        ($path ? DIRECTORY_SEPARATOR.$path : $path);
}

/**
 * Get the home directory config path.
 *
 * @param  string $path
 * @return string
 */
function home_config_path($path = '')
{
    return (new Xdg())->getHomeConfigDir().
        DIRECTORY_SEPARATOR.config('app.name').
        ($path ? DIRECTORY_SEPARATOR.$path : $path);
}
