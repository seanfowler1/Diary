<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddressBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_book', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('tags');
            $table->string('image');
            $table->string('number');
            $table->string('email');
            $table->string('occupation');
            $table->string('birthday');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('twitter');
            $table->string('linkedin');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('postcode');

            $table->string('birthday_unix');
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
        Schema::dropIfExists('address_book');
    }
}
