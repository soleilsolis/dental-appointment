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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreignIdFor(\App\Models\Service::class);
            $table->foreignId('dentist_user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('dentist_user_id')->references('id')->on('users');
            $table->foreign('service_id')->references('id')->on('services');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamp('accepted_at');
            $table->timestamp('cancelled_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};
