<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickupstores_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pickupstore_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('body');

            // $table->unique(['pickupstore_id', 'locale']);
            // $table->foreign('pickupstore_id')->references('id')->on('pickupstores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickupstores_translations');
    }
};
