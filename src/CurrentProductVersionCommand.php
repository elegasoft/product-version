<?php

namespace Elegasoft\ProductVersion;

class CurrentProductVersionCommand extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product-version:current';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Returns the current git tag for the repository';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        return ProductVersion::current();
    }
}