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
        Schema::create('orderinformation', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('order_id');
            $table->string('product_id');
            $table->string('quantity');
            $table->string('price');
            $table->string('total');
            $table->enum('status', ['Pending', 'Processing', 'Delivered','Rejected'])->default('Pending');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payment_id');
            $table->string('payment_date');
            $table->string('payment_amount');
            $table->string('customer_notes');
            $table->string('order_date');
            $table->string('kitchen_notes');
            $table->string('delivery_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderinformation');
    }
};
