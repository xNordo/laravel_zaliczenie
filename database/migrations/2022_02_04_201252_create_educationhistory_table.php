<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educationhistory', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('practitioner_id')->nullable()->index('practitioner_id');
            $table->string('degree', 100)->nullable();
            $table->string('specialisation')->nullable();
            $table->boolean('certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educationhistory');
    }
}
