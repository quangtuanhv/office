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
            $table->string('trich_yeu');
            $table->string('loai');
            $table->integer('do_khan');
            $table->string('linh_vuc');
            $table->text('y_kien')->nullable();
            $table->string('file');
            $table->integer('lanh_dao_xu_ly');
            $table->string('so_van_ban');
            $table->integer('trang_thai');
            $table->date('ngay_het_han');
            $table->integer('co_quan_ban_hanh');
            $table->text('ghi_chu')->nullable();
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
