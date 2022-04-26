<?php

namespace App\Support\Geolocation;

class Place
{
    public function __construct(protected float $latitude, protected float $longitude)
    {
    }

    public function distance(Place $destination): float
    {
        $theta = $this->longitude - $destination->longitude;

        $originSin = sin(deg2rad($this->latitude));
        $originCos = cos(deg2rad($this->latitude));

        $destinationSin = sin(deg2rad($destination->latitude));
        $destinationCos = cos(deg2rad($destination->latitude));

        $thetaCos = cos(deg2rad($theta));

        $distance = $originSin * $destinationSin +  $originCos * $destinationCos * $thetaCos;

        $distance = rad2deg(acos($distance));
        $miles = $distance * 60 * 1.1515;

        return round($miles * 1.609344);
    }
}
