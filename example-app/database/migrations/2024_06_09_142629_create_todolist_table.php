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
        Schema::create('todolist', function (Blueprint $table) {
            $table->id();
            $table->string('title')->required(); // Changed 'Title' to 'title'
            $table->string('description')->nullable(); // Changed 'Description' to 'description'
            $table->boolean('completed')->default(false);
            $table->timestamps(); // Added timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todolist');
    }
};
