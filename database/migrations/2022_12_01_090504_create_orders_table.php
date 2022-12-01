<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

                $table->id();
                $table->string('status',50)->default('nerezervuota');
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('book_id');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');

            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
