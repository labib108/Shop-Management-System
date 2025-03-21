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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',10,2);
            $table->decimal('discount',10,2);
            $table->decimal('vat',10,2);
            $table->decimal('payable',10,2);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                    ->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers')
                    ->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
