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

        $programmingLanguages = ["options" => ["PHP", "Java", "C#", "C / C++", "Ruby", "Python", "Go", "Kotlin", "Javascript", "Swift"]];
        $save                 = new \App\FormElement();
        $save->user_id        = 1;
        $save->form_id        = 1;
        $save->uniqid         = uniqid();
        $save->order_no       = 10;
        $save->title          = "Tercih ettiğiniz programlama dillerini seçiniz.";
        $save->properties     = json_encode($programmingLanguages);
        $save->type           = "form_checkbox";
        $save->save();

        // yazılımcı anketi
        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 10;
        $save->title      = "Yaş aralığınız nedir?";
        $save->properties = json_encode(["options" => ["50 ve üzeri", "40-49", "30-39", "20-29", "19 ve altı"]]);
        $save->type       = "form_radio";
        $save->save();

        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 20;
        $save->title      = "Cinsiyetiniz nedir?";
        $save->properties = json_encode(["options" => ["Bayan", "Erkek"]]);
        $save->type       = "form_radio";
        $save->save();

        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 30;
        $save->title      = "Çalışma durumunuz";
        $save->properties = json_encode(["options" => ["Tam zamanlı", "Serbest olarak tam zamanlı", "Yarı zamanlı", "Serbest olarak yarı zamanlı"]]);
        $save->type       = "form_radio";
        $save->save();


        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 40;
        $save->title      = "Bulunduğunuz sektör";
        $save->properties = json_encode(["options" => ["İletişim", "E-ticaret", "Taşımacılık", "Çok hitli web siteleri", "ERP ve muhasebe", "Diğer"]]);
        $save->type       = "form_radio";
        $save->save();

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
