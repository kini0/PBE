<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
Use Illuminate\Database\Schema\Blueprint;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('id_emett');
            $table->string('id_recept');
            $table->string('conver_id');
            $table->text('message');
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
        Schema::dropIfExists('messages');
    }
}
