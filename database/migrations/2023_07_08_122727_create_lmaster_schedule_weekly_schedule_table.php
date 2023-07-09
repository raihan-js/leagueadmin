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
        Schema::create('master_schedule_weekly_schedule', function (Blueprint $table) {
            $table->unsignedBigInteger('master_schedule_id');
            $table->unsignedBigInteger('weekly_schedule_id');
            $table->timestamps();

            $table->foreign('master_schedule_id')->references('id')->on('master_schedules')->onDelete('cascade');
            $table->foreign('weekly_schedule_id')->references('id')->on('weekly_schedules')->onDelete('cascade');

            // Specify a custom name for the unique constraint
            $table->unique(['master_schedule_id', 'weekly_schedule_id'], 'ms_ws_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_schedule_weekly_schedule');
    }
};
