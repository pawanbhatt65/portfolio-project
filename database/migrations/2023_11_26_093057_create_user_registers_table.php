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
        Schema::create('user_registers', function (Blueprint $table) {
            $table->id('user_register_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('email_verify')->nullable()->default('no');
            $table->string('password');
            $table->string('confirm_password');
            $table->timestamp('added_at')->nullable();
            $table->timestamp('edited_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_registers');
    }
};
