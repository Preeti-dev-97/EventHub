<?php

namespace App\Jobs;

use App\Imports\EventsImport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportEventsJob implements ShouldQueue
{
    use Queueable;

    public $file;

    public $userId;

    /**
     * Create a new job instance.
     */
    public function __construct($file, $userId)
    {
        $this->file = $file;

        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $filePath = storage_path('app/private/' . $this->file);

        Excel::import(new EventsImport($this->userId), $filePath);

        Storage::disk('local')->delete($this->file);
    }
}
