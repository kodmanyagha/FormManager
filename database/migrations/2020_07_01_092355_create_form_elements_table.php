<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormElementsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_elements', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('form_id')->index();
            $table->string('uniqid', 64)->unique();
            $table->unsignedInteger('order_no')->default(0);

            $table->string('title', 512)->nullable();
            $table->string('description', 1024)->nullable();

            $table->string('type', 128)->index();
            $table->boolean('required')->default(true);
            $table->string('required_text', 32)->default('Gerekli');
            $table->text('html_content')->nullable();
            $table->text('properties')->nullable();

            cts($table);

            // foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('form_id')->references('id')->on('forms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_elements');
    }
}
