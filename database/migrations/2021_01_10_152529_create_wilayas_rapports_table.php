<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilayasRapportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wilayas_rapports', function (Blueprint $table) {
            $table->id();
            $table->string('file_name',999);
            $table->string('n_pension',50);
            $table->unsignedBigInteger('wilaya_id')->nullable();
            $table->foreign('wilaya_id')->references('id')->on('wilayas')->onDelete('cascade');
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
        Schema::dropIfExists('wilayas_rapports');
    }
}
