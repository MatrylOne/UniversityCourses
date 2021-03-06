<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'students', function (Blueprint$table) {
            $table->increments('id');

            $table->string('firstName');
            $table->string('lastName');
            $table->integer('course_id')->unsigned()->nullable()->default(null);

            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
