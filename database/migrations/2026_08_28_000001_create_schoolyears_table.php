<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schoolyears', function (Blueprint $table) {
            $table->id();
            $table->string('sxoliko_etos', 9)->unique(); // e.g., "2025_2026"
            $table->boolean('is_current')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schoolyears');
    }
};
