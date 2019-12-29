<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ngo_name');
            $table->string('full_name');
            $table->string('email');
            $table->string('alternate_email')->nullable();
            $table->string('verification_string')->nullable();
            $table->string('mobile');
            $table->string('alternate_mobile')->nullable();
            $table->text('address');
            $table->string('disaster');
            $table->string('password');
        
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
        Schema::dropIfExists('clients');
    }
}
