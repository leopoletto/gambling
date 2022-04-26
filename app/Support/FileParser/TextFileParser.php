<?php

namespace App\Support\FileParser;

use Illuminate\Support\Collection;

class TextFileParser implements FileParser
{
    public function parse($filePath): Collection
    {
        $content = file_get_contents($filePath);

        $rows = collect();

        foreach (explode("\n", $content) as $row) {
            $rows->push(json_decode($row));
        }

        return $rows;
    }
}
