<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_completeds', function (Blueprint $table) {
            $table->id();
            $table->integer('c_id');
            $table->unsignedBigInteger('user_id');
            $table->string('order_no')->unique();
            $table->integer('total');
            $table->text('address');
            $table->string('phone');
            $table->text('msg');
            $table->string('status')->default('completed');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_completeds');
    }
};
