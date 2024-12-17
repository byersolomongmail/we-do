<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignImagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('top_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // Path to the image
            $table->unsignedBigInteger('campaign_id');
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });

        Schema::create('bottom_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // Path to the image
            $table->unsignedBigInteger('campaign_id');
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_images');
        Schema::dropIfExists('bottom_images');
    }
}
