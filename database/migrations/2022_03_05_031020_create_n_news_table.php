<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_news', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('summary');
            $table->longText('content');
            $table->string('file');
            $table->tinyInteger('hightlight');
            $table->integer('view');
            $table->integer('kind_id');
            $table->tinyInteger('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('n_news');
    }
}
