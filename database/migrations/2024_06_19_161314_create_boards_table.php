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
        Schema::create('boards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained(
                    table: 'users', indexName: 'posts_user_id'
                )
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('birthday');
            $table->string('age');
            $table->string('gender');
            $table->string('interest');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boards');
    }
};
