<?php

namespace Tests\Unit;

use App\Support\FileParser\TextFileParser;
use Tests\SetupFakeAffiliateFile;
use Tests\TestCase;

class TextFileParserTest extends TestCase
{
    use SetupFakeAffiliateFile;

    public function test_parse_a_text_file()
    {
        $parser = new TextFileParser;
        $affiliates = $parser->parse($this->file->getRealPath());

        $this->assertCount(7, $affiliates);
    }
}
