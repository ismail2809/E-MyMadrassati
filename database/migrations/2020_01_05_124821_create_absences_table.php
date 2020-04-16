<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('etudiant_id')->unsigned();
            $table->foreign('etudiant_id')->references('id')->on('etudiants');
            $table->integer('professeur_id')->unsigned();
            $table->foreign('professeur_id')->references('id')->on('professeurs');           
            $table->integer('classe_id')->unsigned();
            $table->foreign('classe_id')->references('id')->on('classes');
            $table->integer('annee_id')->unsigned();
            $table->foreign('annee_id')->references('id')->on('années');
            $table->string('absence'); 
            $table->string('observation')->nullable();
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
        Schema::dropIfExists('absences');
    }
}
