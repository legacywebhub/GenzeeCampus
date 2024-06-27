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
        Schema::create('tutor_ads', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->onDelete('cascade'); // Foreign Key referencing User
            $table->foreignId('campus_id')->onDelete('set_null'); // Foreign Key referencing Campus
            $table->string('headline');
            $table->text('description')->nullable();
            $table->string('course_tags')->nullable(); // Comma-separated list
            $table->string('availability_schedule')->nullable();
            $table->string('contact_info')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_ads');
    }
};
