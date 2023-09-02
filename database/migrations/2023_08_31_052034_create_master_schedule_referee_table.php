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
        Schema::create('master_schedule_referee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('master_schedule_id');
            $table->unsignedBigInteger('referee_id');
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->foreign('master_schedule_id')->references('id')->on('master_schedules')->onDelete('cascade');
            $table->foreign('referee_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_schedule_referee');
    }
};
