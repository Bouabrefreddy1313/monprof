<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('question_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('questions')->onDelete('cascade');
            $table->string('source_question_identifier', 60); // code_identifiant de la question déclenchante
            $table->string('operateur', 20)->default('eq'); // eq, in, neq, contains
            $table->text('valeur_attendue'); // JSON ou chaîne
            $table->string('action', 30)->default('show'); // show, hide, skip_to
            $table->string('target_question_identifier', 60)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('question_rules');
    }
};
