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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 100);
            $table->string('username', 20);
            $table->text('bio')->nullable();
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 25);
            $table->foreignId('campus_id')->nullable()->onDelete('set null');
            // $table->enum('role', ['student', 'tutor', 'both'])->default('student');
            $table->string('profile_image_url')->nullable();
            // $table->boolean('kyc_verified')->default(false);
            $table->decimal('overall_rating', 2, 1, true)->nullable(); // Rating out of 5.0
            $table->string('password');
            $table->rememberToken();
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
