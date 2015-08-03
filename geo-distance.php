<?php
define('EARTH_RADIUS_MILES', 3959);
define('EARTH_RADIUS_KILOMETERS', 6371);

/**
 * SLC = Spherical Law of Cosines
 */
function distance_slc($a, $b, $radius = EARTH_RADIUS_MILES)
{
    $delta_lat = $b['lat'] - $a['lat'];
    $delta_lng = $b['lng'] - $a['lng'];
    $distance = sin(deg2rad($a['lat'])) * sin(deg2rad($b['lat'])) + cos(deg2rad($a['lat'])) * cos(deg2rad($b['lat'])) * cos(deg2rad($delta_lng));
    $distance = acos($distance);
    $distance = rad2deg($distance);
    $distance = $distance * 60 * 1.1515;
    $distance = round($distance, 4);
    return $distance;
}

function distance_haversine($a, $b, $radius = EARTH_RADIUS_MILES)
{
    $delta_lat = $b['lat'] - $a['lat'];
    $delta_lng = $b['lng'] - $a['lng'];
    $alpha = $delta_lat / 2;
    $beta = $delta_lng / 2;
    $a1 = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($a['lat'])) * cos(deg2rad($b['lat'])) * sin(deg2rad($beta)) * sin(deg2rad($beta));
    $c = asin(min(1, sqrt($a1)));
    $distance = 2 * $radius * $c;
    $distance = round($distance, 4);
    return $distance;
}

function distance($a, $b, $radius = EARTH_RADIUS_MILES, $type = 'haversine')
{
    $function = 'distance_' . $type;
    if (!function_exists($function)) {
        throw new \Exception(sprintf('Unknown distance type "%s".', $type));
    }
    return $function($a, $b, $radius);
}