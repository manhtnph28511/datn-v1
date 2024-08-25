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
        Schema::create('user_voucher', function (Blueprint $table) {
            $table->increments('id'); // Tạo cột id tự động tăng
            $table->unsignedInteger('user_id'); // Cột user_id với kiểu dữ liệu unsignedBigInteger
            $table->unsignedInteger('voucher_id'); // Cột voucher_id với kiểu dữ liệu unsignedBigInteger
            $table->timestamps(); // Cột created_at và updated_at
            
            // Thiết lập khóa ngoại cho user_id
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            
            // Thiết lập khóa ngoại cho voucher_id
            $table->foreign('voucher_id')
                  ->references('id')
                  ->on('vouchers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_voucher');
    }
};
