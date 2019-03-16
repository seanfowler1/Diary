<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diary', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id');
            $table->string('title');
            $table->string('date');
            $table->string('tags');
            $table->integer('rating');
            $table->string('people');
            $table->string('grateful');
            $table->string('improvements');
            $table->string('summary');
            $table->longText('entry');
            $table->string('tomorrow');

            

            $table->string('date_unix');
            $table->timestamps();
            // last_updated
            // created_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diary');
    }
}
