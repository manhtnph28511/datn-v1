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
        Schema::create('clients_notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type'); // Loại thông báo
            $table->text('data'); // Nội dung thông báo
            $table->boolean('is_read')->default(false); // Đánh dấu đã đọc hay chưa
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients_notifications');
    }
};
