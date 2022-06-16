<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('policy_number')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('pp_number')->nullable();
            $table->string('effective_date')->nullable();
            $table->string('termination_date')->nullable();
            $table->string('destination')->nullable();
            $table->string('mobile')->nullable();
            $table->string('insurance_type')->nullable();
            $table->string('status')->default(0);
            $table->string('creator')->nullable();
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
        Schema::dropIfExists('insurances');
    }
}
