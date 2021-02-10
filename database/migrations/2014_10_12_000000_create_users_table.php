<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->id();
			$table->string('firstname');
			$table->string('lastname');

			$table->enum('group', [
				'admin',
				'user'
			])->default('user');

			$table->string('email', 128)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
