<?php

namespace App\Http\Controllers;

use App\Repositories\AffiliateRepository;
use App\Support\Geolocation\Place;
use App\Support\Geolocation\PlaceCollection;
use Illuminate\Support\Facades\Cache;

class AffiliateController extends Controller
{
    private AffiliateRepository $affiliateRepository;

    public function __construct(AffiliateRepository $affiliateRepository)
    {
        $this->affiliateRepository = $affiliateRepository;
    }

    public function nearBy()
    {
        $affiliates = Cache::remember('affiliates', 3600, function () {
            return $this->affiliateRepository->all();
        });

        $affiliatesOffice = new PlaceCollection($affiliates);
        $dublinOffice = new Place(53.3340285, -6.2535495);

        $nearByAffiliates = $affiliatesOffice->filterByDistance($dublinOffice, 100);

        return view('affiliates/nearby', [
            'affiliates' => $nearByAffiliates->sortBy(['affiliate_id', 'asc'])
        ]);
    }
}
