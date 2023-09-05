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
        Schema::create('pickupstores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('store_name')->unique();
            $table->string('store_email');
            $table->string('store_phone');
            $table->string('store_address1');
            $table->string('store_address2');
            $table->string('store_city');
            $table->string('store_state');
            $table->string('store_country');
            $table->string('store_zip');
            $table->boolean('is_active');
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
        Schema::dropIfExists('pickupstore');
    }
};
