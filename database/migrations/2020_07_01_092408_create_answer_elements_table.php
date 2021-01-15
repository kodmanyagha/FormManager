<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerElementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('answer_elements', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('answer_id')->index();
			$table->unsignedBigInteger('form_id')->index();
			$table->unsignedBigInteger('form_element_id')->index();

			$table->string('form_element_uniqid', 64);

			$table->string('title', 512);
			$table->text('answer')->nullable();

			cts($table);

			// foreign keys
			$table->foreign('answer_id')->references('id')->on('answers');
			$table->foreign('form_id')->references('id')->on('forms');
			$table->foreign('form_element_id')->references('id')->on('form_elements');
			$table->foreign('form_element_uniqid')->references('uniqid')->on('form_elements');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('answer_elements');
	}
}
