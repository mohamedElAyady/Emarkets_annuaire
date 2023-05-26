<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class CountVisitors extends Command
{
    protected $signature = 'visitors:count';
    protected $description = 'Count the number of unique visitors to the website';

    public function handle()
    {
        $count = DB::table('sessions')->distinct('ip_address')->count();

        Cache::put('visitor_count', $count, now()->addDay());

        $this->info('Total Visitors: ' . $count);
    }
}