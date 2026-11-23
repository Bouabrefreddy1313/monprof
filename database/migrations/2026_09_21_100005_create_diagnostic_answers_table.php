<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('diagnostic_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('diagnostic_sessions')->onDelete('cascade');
            $table->foreignId('question_id')->nullable()->constrained('questions')->onDelete('set null');
            $table->string('question_identifier', 60)->index();
            $table->string('question_label'); // copie historique
            $table->text('reponse'); // texte ou JSON
            $table->timestamps();

            $table->index(['session_id', 'question_identifier']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('diagnostic_answers');
    }
};
