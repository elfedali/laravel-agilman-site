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

        Schema::create('sprints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('status')->default('active');
            $table->date('start_date');

            $table->date('end_date')->nullable(); // actual end date
            $table->date('expected_end_date')->nullable(); // expected end date based on the sprint duration
            $table->integer('duration')->nullable(); // duration in days 

            // priority
            $table->string('priority', 10)->default('low');
            // type
            $table->string('type', 10)->default('feature'); // feature, bug, task

            $table->string('assignee')->nullable(); // assigned to user

            // parent_id
            $table->foreignId('parent_id')->nullable()->constrained('sprints')->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sprints');
    }
};
