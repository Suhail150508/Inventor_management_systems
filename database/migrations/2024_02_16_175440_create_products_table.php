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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->string('origin')->nullable();
            $table->string('image')->nullable();
            $table->integer('year')->nullable();
            $table->string('size')->nullable();
            $table->integer('brand_id')->constrained('brands')->unsigned()->nullable();
            $table->integer('category_id')->constrained('categories')->unsigned()->nullable();
            $table->integer('subcategory_id')->constrained('subcategories')->unsigned()->nullable();
            $table->integer('color_id')->constrained('colors')->unsigned()->nullable();
            $table->integer('unit_id')->constrained('units')->unsigned()->nullable();
            $table->dateTime('date')->nullable();
            $table->float('unit_amount')->unsigned()->nullable();
            $table->float('sales_amount')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active')->nullable();
            $table->timestamp('expire_date')->nullable();
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
        Schema::dropIfExists('products');
    }
};
