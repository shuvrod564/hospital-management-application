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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->cascadeOnDelete();
            
            // Clinical Brief
            $table->json('vitals')->nullable(); // Stores: {"bp": "120/80", "weight": "70"}
            $table->text('complaints')->nullable();
            $table->text('diagnosis')->nullable();
            
            // Medications (Stores the dynamic array from JS)
            $table->json('medications')->nullable(); 
            
            // Additional Details
            $table->text('advice')->nullable();
            $table->text('investigations')->nullable();
            $table->date('follow_up_date')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescriptions');
    }
};
