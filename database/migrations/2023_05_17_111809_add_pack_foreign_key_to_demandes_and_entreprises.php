<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Drop the existing pack_id column if it exists
            if (Schema::hasColumn('demandes', 'pack_id')) {
                $table->dropForeign(['pack_id']);
                $table->dropColumn('pack_id');
            }

            // Add the new pack_id column
            $table->unsignedBigInteger('pack_id')->nullable();

            // Add the foreign key constraint
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
        });

        Schema::table('entreprises', function (Blueprint $table) {
            // Drop the existing pack_id column if it exists
            if (Schema::hasColumn('entreprises', 'pack_id')) {
                $table->dropForeign(['pack_id']);
                $table->dropColumn('pack_id');
            }

            // Add the new pack_id column
            $table->unsignedBigInteger('pack_id')->nullable();

            // Add the foreign key constraint
            $table->foreign('pack_id')->references('id')->on('packs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('demandes', function (Blueprint $table) {
            // Drop the pack_id foreign key constraint if it exists
            if (Schema::hasColumn('demandes', 'pack_id')) {
                $table->dropForeign(['pack_id']);
            }

            // Drop the pack_id column if it exists
            if (Schema::hasColumn('demandes', 'pack_id')) {
                $table->dropColumn('pack_id');
            }
        });

        Schema::table('entreprises', function (Blueprint $table) {
            // Drop the pack_id foreign key constraint if it exists
            if (Schema::hasColumn('entreprises', 'pack_id')) {
                $table->dropForeign(['pack_id']);
            }

            // Drop the pack_id column if it exists
            if (Schema::hasColumn('entreprises', 'pack_id')) {
                $table->dropColumn('pack_id');
            }
        });
    }
};
