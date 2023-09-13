<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixedrateTranslationsTablesdsa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixedrate_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fixedrate_id')->unsigned();
            $table->string('locale');
            $table->string('name');
            $table->longText('body');

            $table->unique(['fixedrate_id', 'locale']);
            $table->foreign('fixedrate_id')->references('id')->on('fixedrates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixedrate_translations');
    }
}
