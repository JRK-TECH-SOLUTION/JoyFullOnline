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
        Schema::create('checkout', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customerID');
            $table->string('OrderID');
            $table->string('Total');
            $table->string('PaymentStatus');
            $table->string('PaymentMethod');
            $table->string('PaymentReference')->nullable();
            $table->enum('status', ['Pending', 'Processing', 'Delivered','Rejected','Accepted','Ready to Deliver'])->default('Pending');
            $table->string('Notes')->nullable();
            $table->string('Address');
            $table->string('OrderDate');
            $table->string('DeliveryDate');
            $table->string('riderID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
