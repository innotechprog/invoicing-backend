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
        Schema::create('companies', function (Blueprint $table) {
            $table->string('company_id'); // Adds an auto-incrementing primary key column
            $table->string('company_name'); // Adds a string column for the user's name
          $table->string('company_tel');
            $table->string('company_email');
            $table->string('company_logo');
            $table->string('type');
            $table->string('address_id');
            $table->string('customer_id');
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
