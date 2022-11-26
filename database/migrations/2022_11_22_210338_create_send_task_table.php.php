<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('send_task',function(Blueprint $table){
           $table->id();
           $table->unsignedBigInteger('task_id');
           $table->string('comment',150);
           $table->string('fileName',100)->nullable();
           $table->timestamps();
           $table->foreign('task_id')
               ->references('id_T')
               ->on('user_tasks')
               ->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('send_task');
    }
};
