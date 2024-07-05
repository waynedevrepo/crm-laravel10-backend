<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Enums\UserRole;
use App\Enums\UserStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('team_leader')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('role', ['Admin', 'Team Leader', 'Agent'])->default('Agent');
            $table->string('password');
            $table->string('caller_id')->nullable();
            $table->string('contact_number')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
