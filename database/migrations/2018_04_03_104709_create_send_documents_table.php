<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('send_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nguoichuyen');
            $table->text('noidungchuyen');
            $table->integer('nguoinhan');
            $table->text('ghichu')->nullable();
            $table->text('filedinhkem')->nullable();
            $table->integer('trang_thai');
            $table->integer('id_congvan');
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
        Schema::dropIfExists('send_documents');
    }
}
