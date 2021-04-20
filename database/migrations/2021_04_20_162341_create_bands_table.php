<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Band;

class CreateBandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Table
        Schema::create('bands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('abbr', 10);
            $table->string('alias', 10);
            $table->string('group', 10);
            $table->string('fq_start', 12);
            $table->string('fq_end', 12);
            $table->timestamps();
        });

        $bands = config('bands');

        foreach($bands as $band) {
            Band::create([
                'name' => $band['name'],
                'abbr' => $band['abbr'],
                'alias' => $band['alias'],
                'group' => $band['group'],
                'fq_start' => $band['fq_start'],
                'fq_end' => $band['fq_end']
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bands');
    }
}
