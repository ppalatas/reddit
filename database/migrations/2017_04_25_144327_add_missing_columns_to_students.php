<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingColumnsToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // just saying get the info form this table and add the content below to it.
        Schema::table('students', function (Blueprint $table) {
            //Below are the columns in the table that you want to add. 

            $table->boolean('subscribed')->default(true);
            $table->string('school_name')->default('Codeup');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
            $table->dropColumn('subscribed')->default(true);
            $table->dropColumn('school_name')->default('Codeup');
        });
    }
}
