<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('answers', function (Blueprint $table) {
			$table->id();

			$table->unsignedBigInteger('form_id')->index();

			$table->string('ip', 32);
			$table->string('useragent', 512);

			cts($table);

			// foreign keys
			$table->foreign('form_id')->references('id')->on('forms');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('answers');
	}
}
