<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Enquiry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
            Schema::create('enquiry', function (Blueprint $table) {
            $table->id();
            $table->string('business_id')->nullable();
            $table->integer("service_id")->nullable();
            $table->integer("user_id")->nullable();
            $table->timestamp('selected_date')->useCurrent();
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
