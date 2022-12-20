<?php

namespace Elegasoft\ProductVersion\Tests\Feature;

use Elegasoft\ProductVersion\ProductVersion;
use Elegasoft\ProductVersion\Tests\TestCase;

class ProductVersionTest extends TestCase
{
    /** @test */
    public function it_can_return_the_current_git_version()
    {
        $expectedVersion = config('product-version.default');

        $actualVersion = (new ProductVersion())->current();

        $this->assertEquals($expectedVersion, $actualVersion);
    }

    /** @test */
    public function it_can_bump_the_patch_version()
    {
        $bumpedVersion = (new ProductVersion())->bump();

        $this->markTestIncomplete('Need to mock the Cache/shell_exec to get the expected results.');
    }
}