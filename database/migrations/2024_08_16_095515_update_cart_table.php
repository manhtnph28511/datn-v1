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
        Schema::table('cart', function (Blueprint $table) {
            // Thêm trường discounted_total_price
            $table->decimal('discounted_total_price', 8, 2)->nullable()->after('total_price');
            
            // Cập nhật trường total_price
            $table->decimal('total_price', 8, 2)->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
