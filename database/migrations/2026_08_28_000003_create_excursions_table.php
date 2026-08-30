<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('excursions', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('school_year_id')->constrained('schoolyears')->cascadeOnDelete();
            $table->foreignId('school_id')->constrained('schools')->cascadeOnDelete();
            $table->string('kodikos_sxoleiou', 10); // denormalized for quick access
            $table->string('ar_prot', 50)->nullable(); // protocol number
            $table->timestamp('submit_datetime')->nullable();

            // Status and type
            $table->string('status', 100)->default('ΠΡΟΣΩΡΙΝΑ ΑΠΟΘΗΚΕΥΜΕΝΗ');
            $table->string('eidos_ekdromis', 100); // excursion type
            $table->text('paratiriseis')->nullable(); // remarks

            // Duration
            $table->string('diarkeia_hmeres', 20)->nullable(); // duration in days

            // Registration / Protocol
            $table->string('a_arithmos', 50)->nullable();
            $table->string('ar_prajis_syllogou', 50)->nullable();
            $table->string('ar_pr_egrisis_programmatosdde', 50)->nullable();

            // Program info
            $table->string('eidos_programmatos', 100)->nullable();
            $table->string('titlos_programmatos')->nullable(); // program title or event title or invitation

            // Participants
            $table->string('mathimata')->nullable(); // subjects
            $table->string('tmimata')->nullable(); // classes/departments
            $table->string('proorismos')->nullable(); // destination
            $table->string('onoma_jenodoxeio')->nullable(); // hotel name
            $table->string('onoma_praktoreio')->nullable(); // agency name
            $table->string('metaforika_mesa')->nullable(); // transport means
            $table->string('aritmoi_mesa_anaxorisis', 50)->nullable(); // return vehicle numbers
            $table->string('arithmoi_mesa_epistrofis', 50)->nullable(); // return vehicle numbers

            // Dates and times
            $table->date('hmera_ekdromis_anaxorisis')->nullable();
            $table->date('hmera_epistrofis')->nullable();
            $table->time('ora_anaxorisis')->nullable();
            $table->time('ora_afijis')->nullable();
            $table->time('ora_apoxorisis')->nullable();
            $table->time('ora_epistrofis')->nullable();

            // Student counts
            $table->integer('ar_mathiton')->default(0);
            $table->integer('ar_metakinoumenon')->default(0);

            // Leader info
            $table->string('onoma_arxigos')->nullable();
            $table->string('onoma_anaplirotis_arxigos')->nullable();

            // Accompanying teachers
            $table->integer('plithos_synodoi')->default(0);
            $table->integer('plithos_ektosomadas_synodoi')->default(0);
            $table->text('onomata_synodoi')->nullable();
            $table->text('anaplirotes_synodoi')->nullable();

            // Insurance and agency
            $table->string('asf_symbolaio')->nullable();
            $table->string('praji_epilogi_praktoreiou')->nullable();
            $table->string('ar_pr_anartisisprok', 50)->nullable();

            // Signer info
            $table->string('onoma_ypografonta')->nullable();
            $table->string('prosfonisi_ypografonta')->nullable();
            $table->string('ar_prot_sxoleiou', 50)->nullable();
            $table->date('hmera_diavivastikou')->nullable();

            // Erasmus specific fields
            $table->string('erasmus_ar_simbasis', 100)->nullable();
            $table->string('erasmus_ar_prajis_syllogou_sigrotisi', 100)->nullable();
            $table->string('erasmus_ar_prajis_syllogou_anasigrotisi', 100)->nullable();
            $table->string('erasmus_ar_prajis_syllogon_sinainesi', 100)->nullable();
            $table->string('erasmus_ar_prot_beb_dieythinton', 100)->nullable();
            $table->text('erasmus_lista_mathites_kaitaji')->nullable();
            $table->text('erasmus_lista_kathig_kaieidikotita')->nullable();
            $table->text('erasmus_lista_anaplirkathig_kaieid')->nullable();

            $table->timestamps();

            $table->index(['school_year_id', 'school_id']);
            $table->index('status');
            $table->index('eidos_ekdromis');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('excursions');
    }
};
