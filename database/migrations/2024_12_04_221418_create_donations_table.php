<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id'); // Campaign receiving the donation
            $table->unsignedBigInteger('user_id')->nullable(); // Optional: Donor (if logged in)
            $table->string('donor_name')->nullable(); // Name of the donor (for guest users)
            $table->string('donor_email')->nullable(); // Email of the donor (for contact purposes)
            $table->decimal('donation_amount', 10, 2); // Amount donated
            $table->string('stripe_payment_id')->nullable(); // Stripe payment identifier
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
