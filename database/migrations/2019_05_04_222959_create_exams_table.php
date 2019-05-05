<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_title');
            $table->string('units_taken');
            $table->string('unit_code1');
            $table->string('unit_code2');
            $table->string('unit_code3');
            $table->string('unit_code4');
            $table->string('unit_code5');
            $table->string('unit_code6');
            $table->string('unit_code7');
            $table->string('unit_code8');
            $table->string('unit_code9');
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
        Schema::dropIfExists('exams');
    }
}
