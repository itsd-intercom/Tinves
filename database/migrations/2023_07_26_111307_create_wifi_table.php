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
        Schema::create('wifi', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('wan')->nullable();
            $table->string('lan')->nullable();
            $table->string('wifi_password')->nullable();
            $table->string('login')->nullable();
            $table->string('login_pass')->nullable();
            $table->string('merk')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('wifi');
    }
};
