<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPersonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_person', function (Blueprint $table) {
            $table->increments('person_id');  
            $table->mediumText('person_image')->nullable();  
            $table->string('person_username')->nullable();
            $table->string('person_password')->nullable();
            $table->string('person_gender')->nullable();
            $table->string('person_email')->nullable();
            $table->string('person_number')->nullable();
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
        Schema::dropIfExists('tbl_person');
    }
}
