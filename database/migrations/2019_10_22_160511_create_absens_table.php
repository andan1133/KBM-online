<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_guru');
            $table->String('tgl');
            $table->String('status');
            $table->String('jumlah')->nullable();
            $table->String('hadir')->nullable();
            $table->String('sakit')->nullable();
            $table->String('izin')->nullable();
            $table->String('alfa')->nullable();
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
        Schema::dropIfExists('absens');
    }
}
