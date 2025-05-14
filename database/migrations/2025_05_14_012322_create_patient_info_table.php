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
        Schema::create('patient_info', function (Blueprint $table) {
            $table->id();
            $table->string('name',300);
            $table->string('age',50);
            $table->tinyInteger('age');
            $table->string('gender')->comment('1=Male, 2=Female, 3=Other');
            $table->Integer('district_id');
            $table->text('address');
            $table->Integer('education_status');
            $table->Integer('monthly_income');
            $table->string('contact_number',50);
            $table->Integer('blood_group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_info');
    }
};
