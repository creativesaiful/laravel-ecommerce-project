<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcatas', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');

            $table->string('subcata_name_en');
            $table->string('subcata_name_hin');
            $table->string('subcata_slug_en');
            $table->string('subcata_slug_hin');
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
        Schema::dropIfExists('subcatas');
    }
}
