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
        Schema::create('productinformations', function (Blueprint $table) {
            $table->id();
            $table->string('productname');
            $table->string('productdescription');
            $table->string('productprice');
            $table->string('productquantity');
            $table->string('productcategory');
            $table->string('productimage');
            $table->string('productstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productinformation');
    }
};
