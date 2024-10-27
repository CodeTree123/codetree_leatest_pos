<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_salaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id') // Foreign key: 'employee_id'
            ->constrained('employees') // Assumes an 'employees' table exists
            ->onDelete('cascade'); // Delete salary if the related employee is deleted
            $table->decimal('basic_salary', 10, 2); // Basic salary column with precision
            $table->timestamps(); // 'created_at' and 'updated_at'

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basic_salaries');
    }
};
