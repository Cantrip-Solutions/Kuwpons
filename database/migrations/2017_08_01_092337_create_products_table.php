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
            $table->integer('u_id_fk')->unsigned();
            $table->foreign('u_id_fk')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('cat_id_fk')->unsigned();
            $table->foreign('cat_id_fk')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('ammount');
            $table->integer('original_price');
            $table->integer('saleing_price');
            $table->integer('quantity');
            $table->text('description');
            $table->string('image');
            $table->dateTime('expire_on');
            $table->string('tag');
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