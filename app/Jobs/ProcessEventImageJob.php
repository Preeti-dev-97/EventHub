<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProcessEventImageJob implements ShouldQueue
{
    use Queueable;
    public $event;

    /**
     * Create a new job instance.
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $manager = ImageManager::usingDriver(Driver::class);

        $image = $manager->decodeBinary(Storage::disk('s3')->get($this->event->banner));

        $thumbnailPath = 'thumbnails/' .  pathinfo($this->event->banner, PATHINFO_FILENAME) . '.jpg';

        $thumbnail = $image->cover(400, 250)->encode();

        $path = Storage::disk('s3')->put($thumbnailPath, $thumbnail->toString(), [
            'ContentType' => 'image/jpeg',
        ]);

        $this->event->update(['thumbnail' => $thumbnailPath]);
    }
}
