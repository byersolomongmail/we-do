<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description');
        $table->decimal('amount', 10, 2);
        $table->string('image')->nullable();
        $table->string('location');
        $table->string('city');
        $table->string('country');
        $table->string('province');
        $table->string('email');
        $table->string('phone');
        $table->timestamp('timeline');
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
        Schema::dropIfExists('tasks');
    }
}
