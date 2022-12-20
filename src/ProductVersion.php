<?php

namespace Elegasoft\ProductVersion;

use Illuminate\Support\Facades\Cache;

class ProductVersion
{
    /**
     * Returns the previous git tag for the git repository
     *
     * @return string
     */
    public function previous(): string
    {
        return Cache::get('product_version.previous', config('product-version.default'));
    }

    /**
     * Bumps the semver to the git repository
     *
     * @param bool $major
     * @param bool $minor
     *
     * @return void
     */
    public function bump(bool $major = false, bool $minor = false): string
    {
        $nextVersion = $this->determineNextVersion($major, $minor);
        shell_exec('git tag ' . $nextVersion);
        return $this->reset();
    }

    private function determineNextVersion(bool $major, bool $minor): string
    {
        $productVersionBumper = new ProductVersionBumper($this->current());
        if ($major)
        {
            return $productVersionBumper->bumpMajor();
        }
        if ($minor)
        {
            return $productVersionBumper->bumpMinor();
        }
        return $productVersionBumper->bumpPatch();
    }

    /**
     * Returns the current git tag for the git repository
     *
     * @return string
     */
    public function current(): string
    {
        return $this->getLastestGitTag() ?? config('product_version::default');
    }

    /**
     * Returns the latest git tag from the git repository
     *
     * @return string
     */
    private function getLastestGitTag(): string
    {
        return Cache::rememberForever('product_version.current', function ()
        {
            shell_exec('git fetch --tags --force');
            return shell_exec('git describe --tag') ?? config('product-version.default');
        });
    }

    public function reset(): string
    {
        Cache::put('product_version.previous', $this->current());
        Cache::forget('product_version.current');
        return $this->current();
    }
}
