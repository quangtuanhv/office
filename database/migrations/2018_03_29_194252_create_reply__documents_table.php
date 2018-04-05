<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply__documents', function (Blueprint $table) {
            $table->increments('id');
            $table->text('tencongvan');
            $table->string('so_ky_hieu');
            $table->string('file');
            $table->integer('id_van_ban');
            $table->integer('user_id');
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('reply__documents');
    }
}
