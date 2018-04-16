<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyenXuLyVanBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyen_xu_ly_van_bans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vanban');
            $table->text('ykienxuly');
            $table->string('tepdinhkem')->nullable();
            $table->integer('id_nguoinhan');
            $table->integer('status');
            $table->integer('id_nguoitao');
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
        Schema::dropIfExists('chuyen_xu_ly_van_bans');
    }
}
