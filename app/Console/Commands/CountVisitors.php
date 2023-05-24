<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CountVisitors extends Command
{
    protected $signature = 'visitors:count';
    protected $description = 'Count the number of visitors';

    public function handle()
    {
        $count = Cache::get('visitor_count', 0);
        $count++;
        Cache::put('visitor_count', $count, now()->addDay());

        $this->info('Total Visitors: ' . $count);
    }
}