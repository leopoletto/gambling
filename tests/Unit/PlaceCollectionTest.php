<?php

namespace Tests\Unit;

use App\Repositories\AffiliateRepository;
use App\Support\Geolocation\Place;
use App\Support\Geolocation\PlaceCollection;
use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\SetupFakeAffiliateFile;
use Tests\TestCase;

class PlaceCollectionTest extends TestCase
{
    use SetupFakeAffiliateFile;

    public function test_filter_places_by_distance()
    {
        $repository = app(AffiliateRepository::class);

        $places = new PlaceCollection($repository->all());
        $destination = new Place(53.3340285, -6.2535495);

        $this->assertCount(7, $places);

        $places = $places->filterByDistance($destination, 100);

        $this->assertCount(2, $places);
    }
}
