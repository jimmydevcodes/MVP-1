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
        Schema::create('clinical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('professional_id')->constrained('professionals')->onDelete('cascade');
            $table->foreignId('template_id')->nullable()->constrained('document_templates')->onDelete('set null');
            $table->date('appointment_date')->useCurrent();
            $table->string('consultation_reason')->nullable();
            $table->text('personal_history')->nullable();
            $table->text('family_history')->nullable();
            $table->text('diagnosis')->nullable();
            $table->text('treatment_plan')->nullable();
            $table->text('therapeutic_progress')->nullable(); 
            $table->enum('document_type', ['prescription', 'report', 'exam_result', 'other'])->nullable();
            $table->string('attached_file', 2048)->nullable();
            $table->enum('status', ['active', 'archived', 'void'])->default('active');
            $table->json('content')->nullable(); 
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinical_histories');
    }
};