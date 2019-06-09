<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('good_id')->unsigned();;
            $table->bigInteger('attribute_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('good_id')->references('id')->on('goods')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('good_attributes');
    }
}
