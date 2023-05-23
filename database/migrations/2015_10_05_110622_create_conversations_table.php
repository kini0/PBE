<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
Use Illuminate\Database\Schema\Blueprint;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('id_emett');
            $table->string('id_recept');
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
        Schema::dropIfExists('conversations');
    }
}
