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
        Schema::create('complaint_histories', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_complainant')->nullable();
            $table->string('grade')->nullable();
            $table->string('section')->nullable();
            $table->string('action_taken')->nullable();
            $table->string('date_of_complaint')->nullable();
            $table->string('name_of_complained')->nullable();
            $table->string('complaint')->nullable();
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
        Schema::dropIfExists('complaint_histories');
    }
};
