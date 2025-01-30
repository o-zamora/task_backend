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
        Schema::table('tsk_task', function (Blueprint $table) {
            $table->foreign(['id_status'], 'fk_status_task')->references(['id_status'])->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tsk_task', function (Blueprint $table) {
            $table->dropForeign('fk_status_task');
        });
    }
};
