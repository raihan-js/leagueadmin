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
        Schema::table('master_schedules', function (Blueprint $table) {
            $table->unsignedBigInteger('league_id');

            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('master_schedules', function (Blueprint $table) {
            $table->dropForeign(['league_id']);
            $table->dropColumn('league_id');
        });
    }
};
