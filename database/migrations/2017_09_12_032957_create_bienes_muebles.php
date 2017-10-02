<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBienesMuebles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_muebles_tipo', function (Blueprint $table) {
            $table->integer('id');
            $table->primary('id');
            $table->string('cve_tipo');
        });

        Schema::create('bienes_muebles', function (Blueprint $table) {
            $table->string('cog_id');//->references('cog_id')->on('cogs');
            $table->string('cve_armonizada');
            $table->text('descrip');
            $table->integer('id_tipo');
            $table->foreign('id_tipo')->references('id')->on('bienes_muebles_tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bienes_muebles');
        Schema::dropIfExists('bienes_muebles_tipo');
    }
}
