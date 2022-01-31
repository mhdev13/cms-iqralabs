<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mau_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('package_name', ['personal', 'family','group']);	
            $table->integer('price');
            $table->enum('class_type', ['offline',['online']]);	
            $table->integer('max_student');
            $table->integer('learning_duration');	
            $table->longText('description');	
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
        Schema::dropIfExists('mau_price');
    }
}
