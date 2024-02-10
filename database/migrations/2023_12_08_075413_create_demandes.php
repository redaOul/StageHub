<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string('etablissement');
            $table->date('date_debut_stage');
            $table->date('date_fin_stage');
            $table->string('cv');
            $table->string('lettre_motivation');
            $table->string('demande_stage');
            $table->string('etat')->nullable(false);
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('domaine_id')->references('id')->on('domaines')->onDelete('cascade');
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
        Schema::dropIfExists('demandes');
    }
}
