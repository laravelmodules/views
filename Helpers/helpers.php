<?php

if (! function_exists('views_config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
     function views_config($key = null, $default = null)
     {
         return config('module.views.'.$key, $default);
     }
}
