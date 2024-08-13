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
        Schema::create('completed_order_details', function (Blueprint $table) {
            $table->id();
            
            // $table->foreignId('order_id')->constrained();
            // $table->string('thumbnail');
            // $table->string('name');
            // $table->integer('quantity');
            // $table->integer('price');
            // $table->timestamps();

            $table->unsignedBigInteger('completed_order_id');
    
            $table->string('thumbnail');
            $table->string('name');
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('completed_order_id')->references('id')->on('order_completeds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('completed_order_details');
    }
};
