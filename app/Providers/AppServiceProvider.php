<?php

namespace App\Providers;

use App\Repositories\AffiliateFileRepository;
use App\Repositories\AffiliateRepository;
use App\Support\FileParser\FileParser;
use App\Support\FileParser\TextFileParser;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(AffiliateRepository::class, AffiliateFileRepository::class);
        $this->app->bind(FileParser::class, TextFileParser::class);
    }
}
