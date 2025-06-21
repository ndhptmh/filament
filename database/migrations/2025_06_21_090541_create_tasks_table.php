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
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('level_id');
            $table->foreignId('status_id');
            $table->foreignId('updated_by')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('level_id')->references('id')->on('level')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('status_id')->references('id')->on('status')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('updated_by')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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
