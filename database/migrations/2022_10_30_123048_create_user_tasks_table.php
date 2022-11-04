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
        Schema::create('user_tasks', function (Blueprint $table) {
            $table->id('id_T');
            $table->integer('id_U')->nullable(False);
            $table->string('Title',100)->nullable(False);
            $table->string('Description',300)->nullable(False);
            $table->set('Done',[0,1])->default(0);
            $table->dateTime('DateFrom')->nullable(False);
            $table->dateTime('DateTo')->nullable(False);
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
        Schema::dropIfExists('user_tasks');
    }
};
