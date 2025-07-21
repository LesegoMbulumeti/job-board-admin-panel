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
        Schema::create('jobs_posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); //created_at and updated_at
            $table->timestamp('published_at')->nullable();
            $table->softDeletes(); // adds `deleted_at` and sets up everything & the record isn’t permanently removed — just soft-deleted.
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->text('description');
            $table->string('employment_type');
            $table->string('salary_range')->nullable();
            $table->Boolean('is_active')->default(true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_posts');
    }
};
