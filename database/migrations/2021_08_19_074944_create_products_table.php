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
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->string('id', 11)->primary();
            $table->string('merchant_id', 11)->nullable(false);
            $table->unsignedSmallInteger('category_id')->nullable(false);
            $table->string('name', 32);
            $table->biginteger('price');
            $table->longText('description');
            $table->string('image', 32);
            $table->timestamps();
            $table->foreign('merchant_id')->references('id')->on('merchants');
            $table->foreign('category_id')->references('id')->on('categories');
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