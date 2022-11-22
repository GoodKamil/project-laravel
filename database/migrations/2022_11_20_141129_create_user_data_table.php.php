<?php

use App\Models\Users;
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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id('id_D');
            $table->foreignIdFor(Users::class,'id_U');
            $table->string('address','100');
            $table->string('zip_code','10');
            $table->string('city','50');
            $table->string('country','50')->default('Polska');
            $table->string('province','50');
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
        Schema::dropIfExists('user_data');
    }
};
