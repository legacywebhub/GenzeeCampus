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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('user_id')->onDelete('cascade'); // Connected to initiator
            $table->foreignId('task_category_id')->onDelete('set null'); // Connected to task category/type
            $table->string('title');
            $table->text('description');
            $table->string('course')->nullable();
            $table->timestamp('completion_deadline')->nullable();
            $table->decimal('payment_amount', 12, 2)->nullable();
            $table->enum('status', ['pending', 'in progress', 'completed'])->default('pending');
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
