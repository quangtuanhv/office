<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tasks', function (Blueprint $table) {
				$table->increments('id');
				$table->text('content');
				$table->time('gio');
				$table->date('ngay');
				$table->text('address');
				$table->text('thanhphan');
				$table->integer('profile_id');
				$table->integer('user_id');
				$table->integer('type');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tasks');
	}
}
