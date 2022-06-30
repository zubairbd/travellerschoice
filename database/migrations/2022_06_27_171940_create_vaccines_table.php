<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccines', function (Blueprint $table) {
            $table->id();
            $table->longText('url')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('nid')->nullable();
            $table->string('passport')->nullable();
            $table->string('name')->nullable();
            $table->string('nationality')->nullable();
            $table->string('dob_day')->nullable();
            $table->string('dob_month')->nullable();
            $table->string('dob_year')->nullable();
            $table->string('gender')->nullable();
            $table->string('first_dose')->nullable();
            $table->string('second_dose')->nullable();
            $table->string('boster_dose')->nullable();
            $table->string('vaccine_name')->nullable();
            $table->string('vaccine_name_boster')->nullable();
            $table->string('vaccine_center')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('user')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('vaccines');
    }
}
