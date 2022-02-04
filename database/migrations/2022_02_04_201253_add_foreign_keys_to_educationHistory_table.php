<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEducationHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('education_history', function (Blueprint $table) {
            $table->foreign(['practitioner_id'], 'education_history_ibfk_1')->references(['id'])->on('practitioner')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('education_history', function (Blueprint $table) {
            $table->dropForeign('education_history_ibfk_1');
        });
    }
}
