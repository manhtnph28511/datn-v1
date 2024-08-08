<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('product_variants', function (Blueprint $table) {
        $table->string('image_variant')->nullable()->after('product_id');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('product_variants', function (Blueprint $table) {
        $table->dropColumn('image_variant');
    });
}
};
