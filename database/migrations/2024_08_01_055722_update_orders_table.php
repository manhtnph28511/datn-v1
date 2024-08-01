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
            $table->string('order_status')->after('note')->comment('PENDING, SUCCESS, CANCEL')->default('PENDING');
            $table->string('shipment_status')->after('order_status')->comment('ORDERPLACE, PACKED, SHIPPED, INTRANSIT, OUTFORDELIVERY, DELIVERED, DELAYED, EXCEPTION, RETURNED')->default('ORDERPLACE');
            $table->string('payment_method')->after('shipment_status')->comment('COD, VNPAY')->default('COD');
            $table->integer('payment_id')->after('payment_method')->comment('ID thanh toán khi thanh toán online')->nullable();
        });
    }
};
