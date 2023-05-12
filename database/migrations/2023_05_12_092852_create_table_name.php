<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('raison_sociale');
            $table->string('type_entreprise');
            $table->text('description')->nullable();
            $table->string('ville');
            $table->string('adresse');
            $table->string('email');
            $table->string('telephone');
            $table->text('logo_url')->nullable();
            $table->foreignId('utilisateur_id')->constrained('users');
            $table->string('site_web')->nullable();
            $table->string('secteur_activite')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
};
