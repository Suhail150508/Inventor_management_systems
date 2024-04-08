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
        Schema::create('return__sales__invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->double('sub_total')->nullable();
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
        Schema::dropIfExists('return__sales__invoices');
    }
};
