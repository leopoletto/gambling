<?php

namespace App\Support\Geolocation;

use Illuminate\Support\Collection;

class PlaceCollection extends Collection
{
    public function filterByDistance(Place $destination, int $distance): self
    {
        $places = $this->map(function ($item) use ($destination) {
            $place = new Place($item->latitude, $item->longitude);
            $item->distance = $place->distance($destination);
            return $item;
        });

        return new self(
            $places->filter(fn ($place) => $place->distance <= $distance)
        );
    }
}
