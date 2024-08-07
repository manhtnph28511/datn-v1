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
        Schema::table('orders', function (Blueprint $table) {
            // Xóa cột payment_id
            $table->dropColumn('payment_id');

            // Cập nhật cột payment_method nếu cần thay đổi kiểu dữ liệu hoặc giá trị mặc định
            // Ví dụ: thay đổi cột payment_method thành kiểu dữ liệu khác hoặc thêm giá trị mặc định
            $table->string('payment_method')->comment('COD,Credit_card')->default('null')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Thêm lại cột payment_id nếu cần
            $table->string('payment_id')->nullable();

            // Cập nhật lại cột payment_method nếu cần
            $table->string('payment_method')->change();
        });
    }
};
