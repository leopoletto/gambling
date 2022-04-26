<?php

namespace App\Support\FileParser;

use Illuminate\Support\Collection;

interface FileParser
{
    public function parse(string $filePath): Collection;
}
