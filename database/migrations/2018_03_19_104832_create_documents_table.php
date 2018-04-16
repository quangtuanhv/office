<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('trichyeu');
            $table->string('kihieu');
            $table->integer('id_loaivanban');
            $table->date('ngaybanhanh');
            $table->integer('id_sovanban');
            $table->date('ngayden');
            $table->string('coquanbanhanh');
            $table->string('nguoiky');
            $table->string('chucvu')->nullable();
            $table->string('tepdinhkem');
            $table->string('ghichu')->nullable();
            $table->integer('id_nguoisoan');
            $table->integer('status');
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
        Schema::dropIfExists('documents');
    }
}
