<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDossiers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('age');
            $table->string('phone');
            $table->string('residence');
            $table->string('aetabl');
            $table->string('diplome');
            $table->string('detabl');
            $table->string('filiere');
            $table->string('pays');
            $table->string('user_id');
            $table->string('certificat');
            $table->string('cv');
            $table->string('recu');
            $table->string('lrecommandation');
            $table->string('ldemande');
            $table->string('lmotivation');
            $table->string('imgdiplome');
            $table->string('note');
            $table->string('projet');
            $table->timestamps();

            //mise en place du schema relationel
            

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dossiers');

    }
}
