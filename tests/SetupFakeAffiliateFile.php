<?php

namespace Tests;

use Illuminate\Http\Testing\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait SetupFakeAffiliateFile
{
    protected File $file;

    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('local');

        $content = '{"latitude": "52.986375", "affiliate_id": 12, "name": "Yosef Giles", "longitude": "-6.043701"}
                    {"latitude": "51.92893", "affiliate_id": 1, "name": "Lance Keith", "longitude": "-10.27699"}
                    {"latitude": "51.8856167", "affiliate_id": 2, "name": "Mohamed Bradshaw", "longitude": "-10.4240951"}
                    {"latitude": "52.3191841", "affiliate_id": 3, "name": "Rudi Palmer", "longitude": "-8.5072391"}
                    {"latitude": "53.807778", "affiliate_id": 28, "name": "Macsen Freeman", "longitude": "-7.714444"}
                    {"latitude": "53.4692815", "affiliate_id": 7, "name": "Mikaeel Fenton", "longitude": "-9.436036"}
                    {"latitude": "54.0894797", "affiliate_id": 8, "name": "Addison Lister", "longitude": "-6.18671"}';

        $this->file = UploadedFile::fake()->createWithContent('affiliates.txt', $content);

        config()->set('database.connections.textjson.affiliates', $this->file->getRealPath());
    }
}
