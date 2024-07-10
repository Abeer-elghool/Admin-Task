<?php

namespace App\Jobs;

use App\Models\Statistic;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatisticJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Task $task
    ) {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $statistic =  Statistic::firstOrCreate(['user_id' => $this->task->assigned_to_id]);
        $statistic->increment('task_count');
    }
}
