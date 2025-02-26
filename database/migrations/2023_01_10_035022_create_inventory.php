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
        Schema::create('inventory', function (Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->integer('user_id');
            $table->string('jenis');
            $table->string('hostname')->default('-')->nullable();
            $table->string('merk')->default('-')->nullable();
            $table->string('Processor')->default('-')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('ram')->default('-')->nullable();
            $table->string('grafik')->default('-')->nullable();
            $table->string('hardisk')->default('-')->nullable();
            $table->string('ssd')->default('-')->nullable();
            $table->string('os')->default('-')->nullable();
            $table->string('Office')->default('-')->nullable();
            $table->string('akunOffice')->default("-")->nullable();
            $table->string('legalos')->default("-")->nullable();
            $table->string('internet')->default("-")->nullable();
            $table->string('ipaddress')->default("-")->nullable();
            $table->string('amp')->default("-")->nullable();
            $table->string('umbrella')->default("-")->nullable();            // $table->string('umbrella')->nullable();
            $table->string('anydeskid')->default("-")->nullable();            // $table->string('umbrella')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('inventory');
    }
};
