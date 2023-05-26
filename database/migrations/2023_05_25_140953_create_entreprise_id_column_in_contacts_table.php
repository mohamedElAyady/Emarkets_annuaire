<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('entreprise_id')->nullable();

            // Add foreign key constraint
            $table->foreign('entreprise_id')
                ->references('id')
                ->on('entreprises')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['entreprise_id']);

            // Drop the column
            $table->dropColumn('entreprise_id');
        });
    }
};
