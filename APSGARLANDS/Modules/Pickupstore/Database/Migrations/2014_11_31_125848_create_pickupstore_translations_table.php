<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePickupstoreTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickupstore_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pickupstore_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('body');

            $table->unique(['pickupstore_id', 'locale']);
            $table->foreign('pickupstore_id')->references('id')->on('pickupstores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickupstore_translations');
    }
}
