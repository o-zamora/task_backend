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
        Schema::create('tsk_task', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title', 250);
            $table->text('description')->nullable();
            $table->integer('id_status');
            $table->date('due_date')->nullable();
            $table->string('created_at', 20);
            $table->string('updated_at', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tsk_task');
    }
};
