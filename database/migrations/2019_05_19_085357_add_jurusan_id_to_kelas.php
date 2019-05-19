<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJurusanIdToKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->integer('jurusan_id')->nullable();

            $table->foreign('jurusan_id')->references('id')->on('jurusans')->on_delete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn('jurusan_id');
        });
    }
}
