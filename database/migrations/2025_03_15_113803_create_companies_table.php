<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('name')->default('Default Company Name');
            $table->string('tagline')->nullable(); // Optional tagline
            $table->text('description')->nullable(); // Optional description
            $table->string('business_type')->nullable(); // Type of business
            $table->year('established_year')->nullable(); // Year established
            $table->integer('employees_count')->nullable(); // No. of employees
            $table->string('registration_number')->nullable(); // Business Reg. Number
            $table->string('tax_id')->nullable(); // Tax ID
            $table->string('logo')->nullable(); 
            $table->timestamps(); // created_at & updated_at
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
