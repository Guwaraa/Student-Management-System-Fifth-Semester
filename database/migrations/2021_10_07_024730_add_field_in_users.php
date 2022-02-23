<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['name']);
            $table->integer('Std_Id')->after('id')->unique();
            $table->string('First_Name')->after('Std_Id');
            $table->string('Last_Name')->after('First_Name');
            $table->boolean('is_active')->default(1)->after('remember_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['Std_Id','First_Name','Last_Name']);
            $table->string('name');
        });
    }
}
