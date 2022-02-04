<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePractitionerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practitioner', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->nullable()->unique('email');
            $table->string('cdv_email')->nullable()->unique('cdv_email');
            $table->string('phoneNo', 11)->nullable();
            $table->string('cv')->nullable();
            $table->string('practitioner_card')->nullable();
            $table->timestamp('created_at')->useCurrentOnUpdate()->useCurrent();
            $table->integer('thesis')->nullable();
            $table->integer('commercial_projects_hours')->nullable();
            $table->string('linkedin')->nullable();
            $table->integer('commercial_experience_years')->nullable();
            $table->boolean('participation_in_finished_project')->nullable();
            $table->boolean('team_management')->nullable();
            $table->integer('publications')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('practitioner');
    }
}
