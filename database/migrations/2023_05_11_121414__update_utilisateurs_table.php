<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function ($table) {

            //$table->renameColumn('name', 'nom');
            if (!Schema::hasColumn('users', 'ville')) {
                $table->string('ville')->after('prenom');
            }
            if (!Schema::hasColumn('users', 'zip')) {
                $table->integer('zip')->after('ville');
            }
            if (!Schema::hasColumn('users', 'telephone')) {
                $table->string('telephone')->after('zip');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function ($table) {
            $table->renameColumn('nom', 'name');
            $table->dropColumn(['ville', 'zip', 'telephone']);
        });
    }
};
