<?php

use App\Form;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('slug', 128)->unique();
            $table->string('title', 512)->default('Form');

            $table->enum('type', [
                'normal',
                'step'
            ])->default('normal');

            $table->enum('status', [
                'active',
                'passive',
                'passive_date',
                'passive_limit',
                'passive_date_limit'
            ])->default('active');

            $table->dateTime('end_date')->nullable();
            $table->unsignedBigInteger('max_answer')->nullable();
            $table->string('passive_message', 256)->nullable();

            $table->enum('gratitude_selection', [
                'page',
                'link'
            ])->default('page');
            $table->text('gratitude_page')->nullable();
            $table->string('gratitude_link', 256)->nullable();
            $table->string('gratitude_title', 512)->nullable();
            $table->string('send_button_text', 256)->nullable();

            cts($table);

            // foreign keys
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
