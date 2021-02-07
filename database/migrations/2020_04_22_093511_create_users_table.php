<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('no_identity')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('religion', ['muslim', 'non_muslim']);
            $table->string('birthdate')->nullable();
            $table->string('email')->nullable();
            $table->enum('education', ['sd','smp','sma','s1', 'other'])->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('status', ['active', 'pending','inactive']);
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
        Schema::dropIfExists('users');
    }
}
