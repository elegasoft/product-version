<?php

namespace Elegasoft\ProductVersion\Tests;

use Elegasoft\ProductVersion\ProductVersionServiceProvider;
use Illuminate\Support\Facades\Config;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function getEnvironmentSetUp($app): void
    {

    }

    public function setUp(): void
    {
        parent::setUp();
        Config::set('product-version.default', 'v1.10.100-654-d5006d56a7');
    }

    protected function getPackageProviders($app)
    {
        return [
            ProductVersionServiceProvider::class,
        ];
    }
}