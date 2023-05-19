<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('utilisateurs');
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        // You can recreate the 'utilisateurs' table here if needed
    }
};
