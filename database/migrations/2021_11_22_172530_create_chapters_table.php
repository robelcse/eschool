<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->bigIncrements('chapter_id');
            $table->unsignedBigInteger('subject_id');
            
            $table->string('name');

            $table->foreign('subject_id')
                ->references('subject_id')->on('subjects')
                ->onDelete('cascade');
            
            $table->string('admin_approve')->nullable(); 
            $table->string('teacher_approve')->nullable();    
             
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
        Schema::dropIfExists('chapters');
    }
}
