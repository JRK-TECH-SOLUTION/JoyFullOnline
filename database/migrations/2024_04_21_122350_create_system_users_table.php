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
        Schema::create('system_users', function (Blueprint $table) {
            $table->id();
            $table->string('FullName');
            $table->string('Email');
            $table->string('PhoneNumber');
            $table->string('Address');
            $table->string('Password');
            // add enum for role
            $table->enum('role', ['Owner', 'Kitchen','User'])->default('User');
            $table->string('VerificationCode')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('Status', ['Active', 'Inactive'])->default('Inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_users');
    }
};
