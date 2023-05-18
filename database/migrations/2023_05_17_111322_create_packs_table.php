<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('packs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('duree');
            $table->decimal('prix', 8, 2);
            // Add more columns if needed

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packs');
    }
};
