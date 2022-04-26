<?php

namespace Tests\Unit;

use App\Repositories\AffiliateFileRepository;
use Tests\SetupFakeAffiliateFile;
use Tests\TestCase;

class AffiliateFileRepositoryTest extends TestCase
{
    use SetupFakeAffiliateFile;

    public function test_get_all_records()
    {
        $repository = app(AffiliateFileRepository::class);

        $affiliates = $repository->all();

        $this->assertCount(7, $affiliates);
    }
}
