<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->string('id', 11)->primary();
            $table->string('account_id')->nullable(false)->unique();
            $table->string('name', 32)->nullable(false)->unique();
            $table->string('address', 64);
            $table->string('image', 16);
            $table->enum('is_open', ['0', '1'])->default('0');
            $table->time('opened');
            $table->time('closed');
            $table->enum('is_changename', ['0', '1'])->default('0');
            $table->foreign('account_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('merchants');
    }
}
