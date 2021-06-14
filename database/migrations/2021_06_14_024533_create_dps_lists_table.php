<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDpsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dps_lists', function (Blueprint $table) {
            $table->id();
            $table->string('nkk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('kawin')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('difabel')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('sumberdata')->nullable();
            $table->string('tps')->nullable();
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
        Schema::dropIfExists('dps_lists');
    }
}
