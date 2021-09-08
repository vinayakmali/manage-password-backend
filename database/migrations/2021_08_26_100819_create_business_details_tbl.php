<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessDetailsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_details', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->string('business_name')->nullable();
            $table->integer("business_type")->nullable();
            $table->integer("business_action_button")->nullable();
            $table->string("service_id")->nullable();
            $table->text('business_description')->nullable();
            $table->string('address_line')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('slug')->nullable();
            $table->text('working_hours')->nullable();

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
        Schema::dropIfExists('business_details');
    }
}
