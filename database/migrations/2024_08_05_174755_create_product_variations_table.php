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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->increments('id'); // Tạo cột id với kiểu INT
            $table->integer('product_id')->unsigned(); // Cột khóa ngoại với kiểu INT không dấu
            $table->integer('color_id')->unsigned(); // Hoặc sử dụng integer nếu màu sắc là kiểu số
            $table->integer('size_id')->unsigned(); // Cột size_id kiểu INT không dấu
            $table->decimal('price', 8, 2); // Giá cho từng biến thể sản phẩm
            $table->timestamps(); // Thời gian tạo và cập nhật

            // Thêm khóa ngoại
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variations');
    }
};
