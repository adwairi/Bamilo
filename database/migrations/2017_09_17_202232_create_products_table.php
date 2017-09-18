<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 500);
            $table->integer('category_id')->unsigned();
            $table->string('product_model', 500);
            $table->string('imgUrl', 500)->nullable();
            $table->text('desc');
            $table->float('price');
            $table->enum('status',['not_available', 'available', 'coming_soon']);
            $table->integer('quantity');
            $table->integer('user_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
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
