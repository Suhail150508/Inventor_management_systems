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
        Schema::create('stock_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->integer('total_purchase_qty')->nullable();
            $table->double('product_unit_price')->nullable();
            $table->integer('total_sold_qty')->nullable();
            $table->integer('available_qty')->nullable();
            $table->integer('reserve_qty')->nullable();
            $table->integer('saleable_qty')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_products');
    }
};
