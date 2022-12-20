<?php

namespace Elegasoft\ProductVersion;

class BumpProductVersionCommand extends \Illuminate\Console\Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product-version:bump {--major : bump the Major version} {--minor : bump the Minor version}';

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
        $productVersion = new ProductVersion();
        $current = $productVersion->current();
        $major = (bool)$this->option('major');
        $minor = (bool)$this->option('minor');
        $bumped = $productVersion->bump($major, $minor);

        $this->table(['version', 'tag'], [
            [
                'version' => 'From',
                'tag'     => $current,
            ],
            [
                'version' => 'To',
                'tag'     => $bumped,
            ],
        ]);
    }
}