<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoVanBansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('so_van_bans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tensovanban');
            $table->string('tenviettat');
            $table->string('loaivanban');
            $table->integer('namluutru');
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
        Schema::dropIfExists('so_van_bans');
    }
}
