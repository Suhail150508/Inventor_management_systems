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
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('product_id')->constrained()->nullable();
            $table->unsignedInteger('unit_amount')->nullable();
            $table->unsignedInteger('sell_amount')->nullable();
            $table->unsignedInteger('quantity')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->unsignedInteger('expire_date')->nullable();
            $table->dateTime('date')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
