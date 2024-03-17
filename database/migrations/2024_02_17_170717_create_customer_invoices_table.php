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
        Schema::create('customer_invoices', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('customer_id')->constrained('customers')->unsigned()->nullable();
            $table->double('total_amount')->unsigned()->nullable();
            $table->double('due_amount')->unsigned()->nullable();
            $table->dateTime('date')->nullable();
            $table->enum('status',['Paid','Unpaid'])->default('Paid');
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
        Schema::dropIfExists('customer_invoices');
    }
};
