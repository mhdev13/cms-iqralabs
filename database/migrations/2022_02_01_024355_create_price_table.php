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
        Schema::create('cms_price', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('package_name', ['personal', 'family','group']);
            $table->integer('price');
            $table->enum('class_type', ['offline',['online']]);
            $table->enum('session_type', ['meeting',['monthly']]);
            $table->integer('max_student');
            $table->integer('learning_duration');
            $table->string('description',500);
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
        Schema::dropIfExists('cms_price');
    }
}
