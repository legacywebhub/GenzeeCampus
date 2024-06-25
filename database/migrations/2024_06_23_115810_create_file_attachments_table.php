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
        Schema::create('file_attachments', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('task_id')->onDelete('cascade'); // Foreign Key referencing Task
            $table->string('file_url');
            $table->string('file_type'); // e.g., doc, pdf, etc.
            $table->timestamp('created_at')->useCurrent(); // created_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_attachments');
    }
};
