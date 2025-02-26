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
        Schema::create('spk', function (Blueprint $table) {
            $table->id();
            $table->string('no_spk');
            $table->date('tgl_spk');
            $table->string('nama_spv');
            $table->string('nama_sales');
            $table->string('nama_customer');
            $table->string('jenis');


            $table->date('ktp_pemohon')->nullable();
            $table->date('ktp_pasangan')->nullable();
            $table->date('ktp_penjamin')->nullable();
            $table->date('kk')->nullable();
            $table->date('npwp')->nullable();
            $table->date('pbb')->nullable();
            $table->date('rek_listrik')->nullable();
            $table->date('rek_koran')->nullable();
            $table->date('rek_gaji')->nullable();
            $table->date('bukti_usaha')->nullable();
            $table->date('sku')->nullable();
            $table->date('bukti_tambahan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status')->default('Belum lengkap')->comment('belum lengkap, lengkap');

            $table->date('akta_pendirian')->nullable();
            $table->date('sk_kemenkumham')->nullable();
            $table->date('akta_perubahan')->nullable();
            $table->date('nib')->nullable();
            $table->date('rek_koran_perusahaan')->nullable();
            $table->date('ktp_direksi')->nullable();
            $table->date('ktp_komisaris')->nullable();
            $table->date('ktp_p_saham')->nullable();

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
        Schema::dropIfExists('spk');
    }
};
