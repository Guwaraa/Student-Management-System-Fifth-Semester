<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjectdetails', function (Blueprint $table) {
            $table->id('Subject_id')->autoIncrement();
            $table->string('First_sem')->nullable();
            $table->string('Second_sem')->nullable();
            $table->string('Third_sem')->nullable();
            $table->string('Fourth_sem')->nullable();
            $table->string('Fifth_sem')->nullable();
            $table->string('Sixth_sem')->nullable();
            $table->string('Seventh_sem')->nullable();
            $table->string('Eight_sem')->nullable();

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
        Schema::table('subjectdetails', function (Blueprint $table) {
            $table->dropColumn(['First_sem','Second_sem','Third_sem','Fourth_sem','Fifth_sem','Sixth_sem','Seventh_sem','Eight_sem']);

        });    }
}
