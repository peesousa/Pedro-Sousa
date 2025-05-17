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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category_name');
            $table->string('image_path');
            $table->text('short_description');
            $table->longText('full_description')->nullable();
            $table->text('technologies_used');
            $table->date('project_date');
            $table->string('live_project_url')->nullable();
            $table->string('repository_url')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('sort_order')->nullable()->default(0);
            $table->enum('status', ['published', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
