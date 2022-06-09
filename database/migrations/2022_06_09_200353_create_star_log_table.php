<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStarLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('star_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('star_num')->default(0);
            $table->unsignedInteger('star_type')->default(0);
            $table->string('star_desc', 64)->default('');
            $table->timestamp('createdAt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('star_log');
    }
}
