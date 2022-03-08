<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->longtext('content');
            $table->integer('amount');
            $table->integer('weight');
            $table->string('dimensions');
            $table->string('materials');
            $table->string('color');
            $table->string('size');
            $table->string('file');
            $table->integer('menu_id');
            $table->integer('price')->nullable();
            $table->integer('price_sale')->nullable();
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
        Schema::dropIfExists('products');
    }
}
