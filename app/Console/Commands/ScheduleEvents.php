<?php

namespace App\Console\Commands;

use App\Jobs\ProcessEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class ScheduleEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $jobs = [];

        foreach (range(1009, rand(7000, 50000)) as $item) {
            $jobs[] = new ProcessEvent();
        }

        Queue::bulk($jobs, null, 'main');
    }
}
