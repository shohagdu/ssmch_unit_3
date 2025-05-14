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
            $table->bigIncrements('id'); // BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
            $table->bigInteger('patient_id')->unsigned()->unique(); // Unique, non-auto-incrementing
            $table->string('name', 300);
            $table->tinyInteger('age');
            $table->string('gender')->comment('1=Male, 2=Female, 3=Other');
            $table->integer('district_id');
            $table->text('address');
            $table->tinyInteger('religion');
            $table->integer('occupation');
            $table->integer('education_status');
            $table->integer('monthly_income');
            $table->string('pt_contact_number', 50);
            $table->string('attendent_contact_number', 50);
            $table->string('blood_group', 10);
            $table->string('hospital_reg_no', 50);
            $table->tinyInteger('unit');
            $table->string('ward_no', 50); // Corrected from word_no
            $table->string('bed_no', 50);
            $table->date('admission_date');
            $table->date('discharge_date')->nullable(); // Made nullable
            $table->integer('diagnosis');
            $table->string('present_illness', 100);
            $table->string('past_illness', 100);
            $table->string('comorbidities', 100);
            $table->text('family_history');
            $table->text('drug_history');
            $table->text('previous_drug_history');
            $table->text('clinical_findings');
            $table->text('cbc_result');
            $table->text('s_electrolytes');
            $table->text('s_creatinine');
            $table->text('s_urea');
            $table->text('lft');
            $table->text('s_bilirubin');
            $table->text('sgpt');
            $table->text('sgot');
            $table->text('ggt');
            $table->text('ast');
            $table->text('s_albumin');
            $table->text('s_lipase');
            $table->text('s_amylase');
            $table->text('blood_glucose');
            $table->text('x_ray');
            $table->text('ecg');
            $table->text('usg');
            $table->text('ct_scan');
            $table->text('mri');
            $table->text('mrcp');
            $table->text('ercp');
            $table->text('endoscopy');
            $table->text('colonoscopy');
            $table->text('fnac');
            $table->text('histopathology');
            $table->text('immuno_histochemistry');
            $table->text('genetic_analysis');
            $table->text('others');
            $table->text('name_of_surgeon');
            $table->text('name_of_surgeon_assistant');
            $table->text('name_of_operation');
            $table->date('date_of_operation')->nullable(); // Made nullable
            $table->text('name_of_anesthesia');
            $table->text('operative_findings');
            $table->date('date_of_death')->nullable(); // Made nullable
            $table->text('causes_death');
            $table->timestamps();

            // Optional: Add foreign key constraints if applicable
            // $table->foreign('district_id')->references('id')->on('districts')->onDelete('restrict');
            // $table->foreign('occupation')->references('id')->on('occupations')->onDelete('restrict');
            // $table->foreign('education_status')->references('id')->on('education_statuses')->onDelete('restrict');
            // $table->foreign('diagnosis')->references('id')->on('diagnoses')->onDelete('restrict');
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
