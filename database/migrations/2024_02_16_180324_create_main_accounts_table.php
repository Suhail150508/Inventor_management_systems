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
        Schema::create('main_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total_amount')->default(0)->nullable();
            $table->double('customer_due')->default(0)->nullable();
            $table->double('supliyer_due')->default(0)->nullable();
            $table->integer('amount_invest_id')->nullable();
            $table->integer('amount_withdraw_id')->nullable();
            $table->integer('purchase_id')->nullable();
            $table->integer('purchase_return_id')->nullable();
            $table->integer('sales_product_id')->nullable();
            $table->integer('return_product_id')->nullable();
            $table->float('unit_amount')->nullable();
            $table->float('sales_amount')->nullable();
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
        Schema::dropIfExists('main_accounts');
    }
};
