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
            $table->text('description')->nullable();
            $table->longtext('content')->nullable();
            $table->integer('amount');
            $table->integer('weight')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('materials')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
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
