<?php

namespace App\Repositories;

use App\Support\FileParser\FileParser;
use Illuminate\Support\Collection;

class AffiliateFileRepository implements AffiliateRepository
{
    public function __construct(protected FileParser $parser)
    {
    }

    public function all(): Collection
    {
        return $this->parser->parse(
            config('database.connections.textjson.affiliates')
        );
    }
}
