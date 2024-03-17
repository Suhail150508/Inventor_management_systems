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
        Schema::create('return_products', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('product_id')->constrained('products')->unsigned()->nullable();
            $table->integer('unit_amount')->unsigned()->nullable();
            $table->integer('sales_amount')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->dateTime('date')->nullable();
            $table->integer('expire_date')->unsigned()->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_products');
    }
};
