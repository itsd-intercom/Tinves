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
        Schema::create('inventoryGa', function (Blueprint $table) {
            $table->string('id', 10)->unique();
            $table->integer('user_id')->nullable();
            $table->integer('master_id')->nullable();
            $table->string('status')->nullable();
            $table->string('keterangan')->nullable();
            $table->date('tgl_pembelian')->nullable();
            $table->integer('usia_pemakaian')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('inventoryGa');
    }
};
