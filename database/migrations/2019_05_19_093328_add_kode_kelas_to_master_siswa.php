<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKodeKelasToMasterSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('master_siswa', function (Blueprint $table) {
            $table->string('kode_kelas')->nullable();

            $table->foreign('kode_kelas')->references('kode_kelas')->on('kelas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_siswa', function (Blueprint $table) {
            $table->dropColumn('kode_kelas');
        });
    }
}
