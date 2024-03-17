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
        Schema::create('purchase_products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->integer('product_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('code')->nullable();
            $table->integer('qty')->nullable();
            $table->double('unit_price')->nullable();
            $table->double('total_price')->nullable();
            $table->double('discount')->nullable();
            $table->double('total')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_products');
    }
};
