<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BusinessService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('business_service', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->nullable();
            $table->integer('category')->nullable();
            $table->integer('timeline')->nullable();
            $table->integer('amount')->nullable();
            $table->string('type', 45)->nullable();
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
        //
    }
}
