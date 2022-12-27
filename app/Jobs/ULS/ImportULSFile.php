<?php

namespace App\Jobs\ULS;

use App\Models\ULS\Comment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportULSFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = (60 * 15);

    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if (Str::endsWith($this->file, 'CO.dat')) {

            $contents = Storage::disk('local')->get($this->file);

            $records = explode("\r\n", $contents);

            $upserts = array();

            $columns = Schema::getColumnListing('uls_comments');
            array_pop($columns); // created_at
            array_pop($columns); // updated_at

            $attributes = array();
            $fillable = array();

            foreach ($columns as $key => $value) {
                $attributes[$value] = Schema::getColumnType('uls_comments', $value);
                array_push($fillable, $value);
            }

            array_shift($fillable);

            foreach ($records as $r) {

                if (empty($r)) {
                    continue;
                }

                $record = explode("|", $r);
                array_shift($record); // pop off the record type column

                $comment = array();

                $index = 0;
                foreach ($attributes as $key => $atype) {
                    $comment[$key] = $atype == 'date' ? Carbon::parse($record[$index])->toDateString() : $record[$index];
                    $index ++;
                }

                array_push($upserts, $comment);
            }

            Comment::upsert($upserts, ['id'], $fillable);

        }

    }
}
