<?php

return [

    'latitude' => env(
        'SAPA_LOCATION_LATITUDE',
        -3.4895064428113947
    ),

    'longitude' => env(
        'SAPA_LOCATION_LONGITUDE',
        114.82519402204903
    ),

    'radius' => (float) env(
        'SAPA_LOCATION_RADIUS',
        100
    ),

];