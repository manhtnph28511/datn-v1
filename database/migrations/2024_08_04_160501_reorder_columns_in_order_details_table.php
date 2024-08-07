<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReorderColumnsInOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_details', function (Blueprint $table) {
            // Drop the existing column
            $table->dropColumn('status');
        });

        Schema::table('order_details', function (Blueprint $table) {
            // Recreate the column with the desired position
            $table->string('status')->default('pending')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            // Drop the column again
            $table->dropColumn('status');
        });

        Schema::table('order_details', function (Blueprint $table) {
            // Recreate the column in its original position (if necessary)
            $table->string('status')->default('pending');
        });
    }
}

