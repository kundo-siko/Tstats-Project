<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeritageVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heritage_visits', function (Blueprint $table) {
            $table->id();
			$table->string('employee_no');
			$table->string('number');
			$table->string('age');
			$table->string('nationality');			
			$table->string('heritage_site');
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
        Schema::dropIfExists('heritage_visits');
    }
}
