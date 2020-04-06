<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ProcessEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Event::create([
            'user_id'      => rand(1, 1000),
            'number_id'    => rand(1, 1000),
            'recipient_id' => rand(1, 1000),
            'schedule_id'  => rand(1, 1000),
            't_uid'        => Str::uuid(),
            'v_id'         => Str::uuid(),
        ]);
    }
}
