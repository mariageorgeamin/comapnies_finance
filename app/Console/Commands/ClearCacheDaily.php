<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ClearCacheDaily extends Command
{
    protected $signature = 'cache:clear:daily';
    protected $description = 'Clear the cache daily at 12 am';

    public function handle()
    {
        // Clear the cache using the cache key 'overview'
        Cache::forget('overview');

        // Clear the cache using the cache key 'stock-data'
        Cache::forget('stock-data');

        Log::info('Cache cleared successfully.');

        $this->info('Cache cleared successfully.');

    }
}
