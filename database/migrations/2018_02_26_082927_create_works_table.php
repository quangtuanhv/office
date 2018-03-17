<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('works', function (Blueprint $table) {
				$table->increments('id');
				$table->string('title');
				$table->integer('user_id_send');
				$table->integer('user_id_receive');
				$table->date('receive_date');
				$table->text('content');
				$table->date('deadline');
				$table->integer('status');
				$table->string('file')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('works');
	}
}
