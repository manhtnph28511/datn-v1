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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id'); // Khóa chính tự động tăng
            $table->string('name'); // Tên của blog
            $table->text('content'); // Nội dung của blog
            $table->unsignedInteger('product_id'); // Khóa ngoại liên kết với bảng products
            $table->timestamps(); // Timestamps để lưu thông tin created_at và updated_at

            // Thêm ràng buộc khóa ngoại nếu cần
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
