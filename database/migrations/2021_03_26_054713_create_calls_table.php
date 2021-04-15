<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->id();
            $table->string('call')->unique();
            $table->string('frn');
            $table->string('type');
            $table->string('prev_sign');
            $table->string('prev_class');
            $table->string('trustee_sign');
            $table->string('trustee_name');
            $table->string('operator_name');
            $table->string('addr_1')->nullable();
            $table->string('addr_2')->nullable();
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
        Schema::dropIfExists('calls');
    }
}
