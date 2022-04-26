<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

interface AffiliateRepository
{
    public function all(): Collection;
}
