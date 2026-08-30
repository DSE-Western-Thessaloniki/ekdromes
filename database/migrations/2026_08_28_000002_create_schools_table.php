<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('school_year_id')->constrained('schoolyears')->cascadeOnDelete();
            $table->string('kodikos_sxoleiou', 10); // school code
            $table->string('typos_sxoleiou', 50); // ΓΥΜΝΑΣΙΟ, ΛΥΚΕΙΟ, ΕΠΑΛ, ΕΚ
            $table->string('displayname'); // school name
            $table->string('phonenumbers', 20)->nullable();
            $table->string('usermail')->nullable(); // primary email
            $table->string('email')->nullable(); // CAS email (login identifier)
            $table->timestamps();

            $table->unique(['school_year_id', 'kodikos_sxoleiou']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
