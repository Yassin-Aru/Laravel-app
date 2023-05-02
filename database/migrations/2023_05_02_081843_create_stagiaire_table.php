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
        Schema::create('stagiaire', function (Blueprint $table) {
            $table->id();
            $table->string('ctf');
            $table->string('nom');
            $table->string('prenom');
            $table->string('niveau');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->foreign('status_id')
            ->references('id')
            ->on('status')
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
        Schema::dropIfExists('stagiaire');
    }
};
