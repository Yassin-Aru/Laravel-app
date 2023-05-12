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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->string('ctf');
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->date('birthDate');
            $table->string('email')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id')
            ->references('id')
            ->on('statuses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
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
        Schema::dropIfExists('stagiaires');
    }
};
