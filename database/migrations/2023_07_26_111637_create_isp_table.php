<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isp', function (Blueprint $table) {
            $table->id();
            $table->string('name_isp')->nullable();
            $table->string('lokasi_id')->nullable();
            $table->double('internet_number')->nullable();
            $table->double('ip')->nullable();
            $table->string('up_down')->nullable();
            $table->double('speed')->nullable();
            $table->integer('no_telfon')->nullable();
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
        Schema::dropIfExists('isp');
    }
};
