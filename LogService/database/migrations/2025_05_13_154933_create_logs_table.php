<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->dateTime('time');
            $table->string('duration');
            $table->ipAddress('ip');
            $table->text('url');
            $table->string('method', 10);
            $table->text('input')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};
