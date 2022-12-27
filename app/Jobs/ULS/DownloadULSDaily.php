<?php

namespace App\Jobs\ULS;

use ZipArchive;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DownloadULSDaily implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600; // ten minutes

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

        $file = 'https://data.fcc.gov/download/pub/uls/daily/l_am_thu.zip';
        $contents = file_get_contents($file);
        Storage::disk('local')->put('uls/licenses/daily.zip', $contents);

        $zip = new ZipArchive;

        if ($zip->open(storage_path('app/uls/licenses/daily.zip')) === true) {

            $zip->extractTo(storage_path('app/uls/licenses/daily/'));
            $zip->close();

            if ($files = Storage::files('uls/licenses/daily')) {
                foreach ($files as $file) {
                    ImportULSFile::dispatchSync($file);
                }
            }
        }

    }
}
