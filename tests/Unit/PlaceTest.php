<?php

namespace Tests\Unit;

use App\Support\Geolocation\Place;
use Tests\TestCase;

class PlaceTest extends TestCase
{
    /**
     * @dataProvider placesProvider
     */
    public function test_calculate_correct_distance($latitude, $longitude, $expectedDistance)
    {
        $place = new Place(53.3340285, -6.2535495);
        $destination = new Place($latitude, $longitude);

        $distance = $place->distance($destination);

        $this->assertEquals($distance, $expectedDistance);
    }

    public function placesProvider()
    {
        return [
            [52.986375, -6.043701, 41],
            [53.2451022, -6.238335, 10],
            [54.0894797, -6.18671, 84]
        ];
    }
}
