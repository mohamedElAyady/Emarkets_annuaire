<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Drop the pack column if it exists
            if (Schema::hasColumn('demandes', 'pack')) {
                $table->dropColumn('pack');
            }
        });

        Schema::table('entreprises', function (Blueprint $table) {
            // Drop the pack column if it exists
            if (Schema::hasColumn('entreprises', 'pack')) {
                $table->dropColumn('pack');
            }
        });
    }

    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Add the pack column
            $table->string('pack')->nullable();
        });

        Schema::table('entreprises', function (Blueprint $table) {
            // Add the pack column
            $table->string('pack')->nullable();
        });
    }
};
