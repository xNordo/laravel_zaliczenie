<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToEducationhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educationhistory', function (Blueprint $table) {
            $table->foreign(['practitioner_id'], 'educationhistory_ibfk_1')->references(['id'])->on('practitioner')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educationhistory', function (Blueprint $table) {
            $table->dropForeign('educationhistory_ibfk_1');
        });
    }
}
