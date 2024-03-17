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
        Schema::create('purchase_product_joins', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('product_id')->constrained('products')->unsigned()->nullable();
            $table->foreignId('purchase_id')->constrained('purchases')->unsigned()->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_product_joins');
    }
};
