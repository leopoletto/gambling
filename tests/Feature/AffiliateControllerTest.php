<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Cache;
use Tests\SetupFakeAffiliateFile;
use Tests\TestCase;

class AffiliateControllerTest extends TestCase
{
    use SetupFakeAffiliateFile;

    public function test_it_shows_nearby_affiliates()
    {
        $response = $this->get(route('affiliates.nearby'));

        $response->assertOk()
            ->assertSeeTextInOrder(['Addison Lister', 'Yosef Giles'])
            ->assertDontSeeText([
                'Lance Keith',
                'Mohamed Bradshaw',
                'Rudi Palmer',
                'Macsen Freeman',
                'Mikaeel Fenton',
            ]);
    }

    public function test_it_caches_the_affiliates_list()
    {
        Cache::shouldReceive('remember')->once()->withSomeOfArgs('affiliates', 3600);

        $this->get(route('affiliates.nearby'));
    }
}
