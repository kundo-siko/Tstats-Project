<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park_visits', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no');
			$table->string('number');
			$table->string('nationality');			
			$table->string('park_name');
			$table->string('fee_type');
			$table->string('fee');
			$table->string('month');
			$table->string('year');
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
        Schema::dropIfExists('park_visits');
    }
}
