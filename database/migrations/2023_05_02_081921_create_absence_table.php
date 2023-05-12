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
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->date('abs_date');
            $table->unsignedBigInteger('stagiaire_id')->nullable();
            $table->unsignedBigInteger('seance_id')->nullable();
            $table->unsignedBigInteger('excuse_id')->nullable();
            $table->foreign('stagiaire_id')
            ->references('id')
            ->on('stagiaires')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('seance_id')
            ->references('id')
            ->on('seances')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreign('excuse_id')
            ->references('id')
            ->on('excuses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
};
