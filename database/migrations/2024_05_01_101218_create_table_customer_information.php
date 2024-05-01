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
        Schema::create('customerInformation', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Email');
            $table->string('PhoneNumber');
            $table->string('Address');
            $table->string('Password');
            $table->enum('Status', ['Active', 'Inactive','Not'])->default('Not');
            $table->string('VerificationCode');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customerInformation');
    }
};
