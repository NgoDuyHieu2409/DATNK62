<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManageBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_bills', function (Blueprint $table) {
            $table->id();
            $table->string('id_oder');
            $table->string('id_ban');
            $table->string('user_id');
            $table->string('total');
            $table->string('status');
            $table->string('time_start');
            $table->string('time_end');
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
        Schema::dropIfExists('manage_bills');
    }
}
