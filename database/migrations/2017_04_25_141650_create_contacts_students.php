<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create or modify tables 
        Schema::create('students', function(Blueprint $table){
            $table->increments('id'); // id int not null auto_increment
            $table->string('first_name', 300); // first name varchar (300)
            $table->string('description')->nullable();//description varchar(255)
            //Audit columns created_at, update_at DATETIME
            $table->timestamps();  // creating two columns: DATE , TIME 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //used to drop a table or undo changes 
        Schema::drop('students');
    }
}
