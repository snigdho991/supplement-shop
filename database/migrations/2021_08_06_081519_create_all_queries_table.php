<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_queries', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->integer('phone');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('businessname')->nullable();
            $table->string('address');
            $table->string('ip_address');
            $table->unsignedInteger('zip');
            $table->string('city');
            $table->string('state');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('all_queries');
    }
}
