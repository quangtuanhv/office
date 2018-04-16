<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuLyVanBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xu_ly_van_bans', function (Blueprint $table) {
            $table->increments('id');
            $table->text('quatrinhxuly');
            $table->string('dinhkemtaptin')->nullable();
            $table->integer('nguoinhan')->nullable();
            $table->integer('nguoixuly');
            $table->integer('id_vanban');
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
        Schema::dropIfExists('xu_ly_van_bans');
    }
}
