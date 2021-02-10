<?php

use App\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save                  = new Form();
        $save->user_id         = 1;
        $save->slug            = 'tercih-edilen-programlama-dilleri';
        $save->title           = 'Tercih Edilen Programlama Dilleri';
        $save->type            = 'normal';
        $save->status          = 'active';
        $save->passive_message = 'Bu form şu anda kullanılamaz.';
        $save->save();

        $save                  = new Form();
        $save->user_id         = 1;
        $save->slug            = 'yazilimci-anketi';
        $save->title           = 'Yazılımcı Anketi';
        $save->type            = 'normal';
        $save->status          = 'active';
        $save->passive_message = 'Bu form şu anda kullanılamaz.';
        $save->save();

        $programmingLanguages = ["options" => ["PHP", "Java", "C#", "C / C++", "Ruby", "Python", "Go", "Kotlin", "Javascript", "Swift"]];
        $save                 = new \App\FormElement();
        $save->user_id        = 1;
        $save->form_id        = 1;
        $save->uniqid         = uniqid();
        $save->order_no       = 10;
        $save->title          = "Tercih ettiğiniz programlama dillerini seçiniz.";
        $save->properties     = json_encode($programmingLanguages, JSON_PRETTY_PRINT);
        $save->type           = "form_checkbox";
        $save->save();

        // yazılımcı anketi
        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 10;
        $save->title      = "Yaş aralığınız nedir?";
        $save->properties = json_encode(["options" => ["50 ve üzeri", "40-49", "30-39", "20-29", "19 ve altı"]], JSON_PRETTY_PRINT);
        $save->type       = "form_radio";
        $save->save();

        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 20;
        $save->title      = "Cinsiyetiniz nedir?";
        $save->properties = json_encode(["options" => ["Bayan", "Erkek"]], JSON_PRETTY_PRINT);
        $save->type       = "form_radio";
        $save->save();

        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 30;
        $save->title      = "Çalışma durumunuz";
        $save->properties = json_encode(["options" => ["Tam zamanlı", "Serbest olarak tam zamanlı", "Yarı zamanlı", "Serbest olarak yarı zamanlı"]], JSON_PRETTY_PRINT);
        $save->type       = "form_radio";
        $save->save();

        $save             = new \App\FormElement();
        $save->user_id    = 1;
        $save->form_id    = 2;
        $save->uniqid     = uniqid();
        $save->order_no   = 40;
        $save->title      = "Bulunduğunuz sektör";
        $save->properties = json_encode(["options" => ["İletişim", "E-ticaret", "Taşımacılık", "Çok hitli web siteleri", "ERP ve muhasebe", "Diğer"]], JSON_PRETTY_PRINT);
        $save->type       = "form_radio";
        $save->save();
    }
}
