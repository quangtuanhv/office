<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuLyHoSoPhoiHopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xu_ly_ho_so_phoi_hops', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_hoso');
            $table->text('ykien')->nullable();
            $table->string('tepdinhkem')->nullable();
            $table->integer('nguoigopy');
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
        Schema::dropIfExists('xu_ly_ho_so_phoi_hops');
    }
}
