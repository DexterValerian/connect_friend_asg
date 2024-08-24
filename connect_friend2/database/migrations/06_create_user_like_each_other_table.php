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
        Schema::create('user_like_each_other', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user1')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_user2')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('vidcall_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_like_each_other');
    }
};
