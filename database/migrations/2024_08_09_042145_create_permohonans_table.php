<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi')->default('');
            $table->date('tanggal_permohonan')->nullable()->change();
            $table->string('jenis_layanan')->nullable()->change();
            $table->string('proses_saat_ini');
            $table->enum('status', ['diproses', 'tidak_lolos', 'lolos']);
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
        Schema::dropIfExists('permohonans');
    }
}
