<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInStudentdetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentdetails', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('contact_number')->nullable();
            $table->string('registration_no')->nullable();
            $table->string('parent_fname')->nullable();
            $table->string('parent_lname')->nullable();
            $table->string('parent_contact')->nullable();
            $table->string('profile_image');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studentdetails', function (Blueprint $table) {
            $table->dropColumn(['first_name','last_name','email','address','contact_number','registration_no','parent_fname','parent_lname','parent_contact','profile_image']);
        });
    }
}
