<?php

return [
    'latitude' => env('SAPA_LOCATION_LATITUDE'),
    'longitude' => env('SAPA_LOCATION_LONGITUDE'),
    'radius' => (float) env('SAPA_LOCATION_RADIUS', 100),

    'enabled' => filter_var(
        env('SAPA_LOCATION_ENABLED', true),
        FILTER_VALIDATE_BOOLEAN
    ),

    'longitude' => env('SAPA_LOCATION_LONGITUDE'),


    /*
    |--------------------------------------------------------------------------
    | Radius Lokasi
    |--------------------------------------------------------------------------
    |
    | Satuan yang digunakan adalah meter.
    |
    */

    'radius' => (float) env('SAPA_LOCATION_RADIUS', 100),

];