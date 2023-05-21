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
        Schema::create('tooth_charts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\Appointment::class);
            $table->foreign('appointment_id')->references('id')->on('appointments')->onDelete('cascade');
            $table->uuid('tooth_type_id');
            $table->foreign('tooth_type_id')->references('id')->on('tooth_types');
            $table->foreignIdFor(\App\Models\Condition::class)->nullable();
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->json('modifications')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tooth_charts');
    }
};
