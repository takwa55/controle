<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('n_pension');
            $table->string('nom');
            $table->date('demande');
            $table->date('reponse');
            $table->string('periode');
            $table->string('emp',63);
            $table->string('rapport');
            $table->softDeletes();
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
        Schema::dropIfExists('wilayas');
    }
}
