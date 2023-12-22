<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->string('alamat')->nullable();
            $table->string('aboutourfood')->nullable();
            $table->text('aof_body')->nullable();
            $table->string('ourblog')->nullable();
            $table->string('ourblog_body')->nullable();

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
        Schema::dropIfExists('biodatas');
    }
}
