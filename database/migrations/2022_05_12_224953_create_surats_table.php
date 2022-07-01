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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id');
            $table->string('nama_pasien');
            $table->string('no_bpjs');
            $table->char('gender', 1);
            $table->string('ttl');
            $table->integer('umur');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('golongan_darah');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->timestamp('tgl_pembuatan');
            $table->string('foto_ktp')->nullable();
            $table->string('kartu_keluarga')->nullable();
            $table->string('kartu_bpjs')->nullable();
            $table->string('kartu_berobat')->nullable();
            $table->string('suket_dokter')->nullable();
            $table->integer('is_confirm')->nullable();
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
        Schema::dropIfExists('surats');
    }
};
