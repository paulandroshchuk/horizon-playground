<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('number_id');
            $table->unsignedBigInteger('recipient_id');
            $table->unsignedBigInteger('schedule_id');
            $table->unsignedBigInteger('some_id')->nullable();
            $table->string('t_uid', 70)->unique();
            $table->string('v_id', 70)->unique();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->foreign('number_id')
                ->references('id')
                ->on('numbers')
                ->onDelete('CASCADE');

            $table->foreign('recipient_id')
                ->references('id')
                ->on('recipients')
                ->onDelete('CASCADE');

            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
