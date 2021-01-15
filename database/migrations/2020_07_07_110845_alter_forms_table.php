<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFormsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('forms', function (Blueprint $table) {
			$table->string('feedback_email', 256)->nullable()->after('gratitude_link');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('forms', function (Blueprint $table) {
			$table->dropColumn('feedback_email');
		});
	}
}
