<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserVeichlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_veichles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->default(0);
            $table->string('brand_id')->default(0);
            $table->string('model_id')->default(0);
            $table->string('year_id')->default(0);
            $table->string('default_veichle')->default(0);
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
        Schema::dropIfExists('user_veichles');
    }
}
