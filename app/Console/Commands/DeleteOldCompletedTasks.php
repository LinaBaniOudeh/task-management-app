<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class DeleteOldCompletedTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * You can run this command via:
     * php artisan tasks:delete-old
     */
    protected $signature = 'tasks:delete-old';

    /**
     * The console command description.
     */
    protected $description = 'Deletes tasks that were completed more than 30 days ago';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $cutoffDate = Carbon::now()->subDays(30);

        $deleted = Task::where('is_completed', true)
            ->where('updated_at', '<', $cutoffDate)
            ->delete();

        $this->info("Deleted {$deleted} tasks completed more than 30 days ago.");

        return Command::SUCCESS;
    }
}
