<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_monthly_report', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('year',['2022','2021','2020','2019']);
            $table->enum('month', ['1','2','3','4','5','6','7','8','9','10','11','12']);
            $table->integer('count');
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
        Schema::dropIfExists('cms_monthly_report');
    }
}
