<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('experience')->nullable();
            $table->text('feedback')->nullable();
            $table->json('technologies')->nullable(); // json yoki text bo'lishi mumkin
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'email',
                'gender',
                'experience',
                'feedback',
                'technologies'
            ]);
        });
    }
};
