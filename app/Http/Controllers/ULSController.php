<?php

namespace App\Http\Controllers;

use ZipArchive;
use Illuminate\Support\Str;
use App\Jobs\ULS\ImportULSFile;
use App\Jobs\ULS\DownloadULSDaily;
use App\Jobs\ULS\DownloadULSWeekly;
use App\Models\ULS\Comment;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ULSController extends Controller
{
    public function sync_comments()
    {
        DownloadULSWeekly::dispatch();
        return 'Dispatched';
    }
}
