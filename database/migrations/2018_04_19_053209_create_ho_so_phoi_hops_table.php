<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoSoPhoiHopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ho_so_phoi_hops', function (Blueprint $table) {
            $table->increments('id');
            $table->text('noidung');
            $table->integer('nguoisoan');
            $table->string('tepdinhkem')->nullable();
            $table->text('ghichu')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('ho_so_phoi_hops');
    }
}
