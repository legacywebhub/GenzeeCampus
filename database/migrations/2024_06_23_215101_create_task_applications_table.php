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
        Schema::create('task_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('task_id')->onDelete('cascade'); // Foreign Key referencing Task
            $table->foreignId('user_id')->onDelete('do nothing'); // Foreign Key referencing User (applicant)
            $table->enum('status', ['applied', 'assigned', 'reassigned', 'rejected', 'completed'])->default('applied');
            $table->timestamp('date_applied')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_applications');
    }
};
