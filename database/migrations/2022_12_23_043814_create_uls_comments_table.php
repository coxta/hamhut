<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateULSCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uls_comments', function (Blueprint $table) {
            $table->integer('id', false, true)->unique()->primary();
            $table->string('uls_file_number', 14)->nullable();
            $table->string('call_sign', 10);
            $table->date('comment_date');
            $table->string('description');
            $table->string('status_code', 1);
            $table->date('status_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uls_comments');
    }
}
