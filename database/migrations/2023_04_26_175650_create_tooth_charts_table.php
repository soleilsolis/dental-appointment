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
            $table->foreignIdFor(\App\Models\User::class);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignIdFor(\App\Models\ToothType::class);
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreignIdFor(\App\Models\Condition::class);
            $table->foreign('tooth_type_id')->references('id')->on('tooth_types');
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
