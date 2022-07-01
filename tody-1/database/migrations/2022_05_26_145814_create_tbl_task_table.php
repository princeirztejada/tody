<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_task', function (Blueprint $table) {
            $table->increments('task_id');  
            $table->string('task_status')->nullable();
            $table->string('task_name')->nullable();
            $table->string('task_category')->nullable();
            $table->string('task_owner')->nullable();
            
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
        Schema::dropIfExists('tbl_task');
    }
}
