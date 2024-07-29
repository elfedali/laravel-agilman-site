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
        Schema::disableForeignKeyConstraints();

        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('users');
            $table->string('title');
            $table->string('slug')->unique();

            $table->text('description')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('visibility', 10)->nullable();
            $table->string('thumbnail')->nullable();
            // dates
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();




            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
