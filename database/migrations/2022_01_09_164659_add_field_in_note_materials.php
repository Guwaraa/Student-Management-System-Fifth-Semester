<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldInNoteMaterials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('note_materials', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('remarks')->after('title');
            $table->string('semester')->after('remarks');
            $table->string('subjectname')->after('semester');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('note_materials', function (Blueprint $table) {
            $table->dropColumn(['title','remarks','semester','subjectname']);

        });
    }
}
