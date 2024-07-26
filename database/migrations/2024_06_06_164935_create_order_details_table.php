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
        
            Schema::create('order_details', function (Blueprint $table) {
                $table->id(); // Tạo cột id tự tăng
                $table->unsignedBigInteger('order_id'); // Cột order_id
                $table->unsignedBigInteger('pro_id'); // Cột pro_id
                $table->unsignedBigInteger('size_id')->nullable(); // Cột size_id
                $table->unsignedBigInteger('color_id')->nullable(); // Cột color_id
                $table->decimal('price', 8, 2); // Cột price
                $table->integer('quantity'); // Cột quantity
                $table->decimal('total_price', 10, 2); // Cột total_price
                $table->text('type'); // Cột type
                $table->timestamps(); // Cột created_at và updated_at
    
                // Thêm khóa ngoại
                $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
