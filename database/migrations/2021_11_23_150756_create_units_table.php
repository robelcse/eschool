<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->bigIncrements('unit_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('chapter_id');
            $table->unsignedBigInteger('grade_id');
            
            $table->string('name');
            $table->string('description');

            $table->foreign('subject_id')
                ->references('subject_id')->on('subjects')
                ->onDelete('cascade');

            $table->string('admin_approve')->nullable();   
            $table->string('teacher_approve')->nullable();    

            // $table->foreign('chapter_id')
            //     ->references('chapter_id')->on('chapters')
            //     ->onDelete('cascade');

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
        Schema::dropIfExists('units');
    }
}
