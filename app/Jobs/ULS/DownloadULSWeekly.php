<?php

namespace App\Jobs\ULS;

use Exception;
use ZipArchive;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DownloadULSWeekly implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = (60 * 15);

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

        $file = 'https://data.fcc.gov/download/pub/uls/complete/a_amat.zip';
        $contents = file_get_contents($file);
        Storage::disk('local')->put('uls/licenses/weekly.zip', $contents);

        $zip = new ZipArchive;

        if ($zip->open(storage_path('app/uls/licenses/weekly.zip')) === true) {

            $zip->extractTo(storage_path('app/uls/licenses/weekly/'));
            $zip->close();

            if ($files = Storage::files('uls/licenses/weekly')) {
                foreach ($files as $file) {
                    ImportULSFile::dispatch($file);
                }
            }
        }

    }
}
