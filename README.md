Geo distance
============
Helpers for getting the distance between 2 2d points

Usage
=====

```php
require '/your/path/to/geo-distance.php';
$d1 = distance( array( 'lng' => '44.21', 'lat' => '23.48' ), array( 'lng' => '47.10',  'lat' => '27.40' ), EARTH_RADIUS_MILES,      'slc' );
$d2 = distance( array( 'lng' => '44.21', 'lat' => '23.48' ), array( 'lng' => '47.10',  'lat' => '27.40' ), EARTH_RADIUS_KILOMETERS, 'haversine' );
// use in any way you see it fit
```

Enjoy :D