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
        Schema::create('address', function (Blueprint $table) {
            $table->string('address_id')->primary();
            $table->string('address_1');
            $table->string('address_2');
            $table->string('address_3');
            $table->string('city');
            $table->string('state');
            $table->string('code');
            $table->string('country');
            $table->string('customer_id')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
