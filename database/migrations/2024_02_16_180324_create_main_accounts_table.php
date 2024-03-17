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
            $table->bigIncrements('id')->unsigned();
            $table->double('total_amount')->unsigned()->nullable();
            $table->foreignId('amount_invest_id')->constrained('amount_invests')->unsigned()->nullable();
            $table->foreignId('amount_withdraw_id')->constrained('amount_withdraws')->unsigned()->nullable();
            $table->foreignId('purchase_id')->constrained('purchases')->unsigned()->nullable();
            $table->foreignId('purchase_return_id')->constrained('purchase_returns')->unsigned()->nullable();
            $table->foreignId('sales_product_id')->constrained('sales_products')->unsigned()->nullable();
            $table->foreignId('return_product_id')->constrained('return_products')->unsigned()->nullable();
            $table->float('unit_amount')->unsigned()->nullable();
            $table->float('sales_amount')->unsigned()->nullable();
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
