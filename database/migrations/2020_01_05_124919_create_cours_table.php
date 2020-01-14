<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->integer('professeur_id')->unsigned();
            $table->foreign('professeur_id')->references('id')->on('professeurs');
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->integer('matiere_id')->unsigned();
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->integer('année_id')->unsigned();
            $table->foreign('année_id')->references('id')->on('années');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('cours');
    }
}
