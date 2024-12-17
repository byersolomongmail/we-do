<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCampaignsTableWithGoalAndCredentials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->decimal('goal_amount', 10, 2)->after('needs_amount'); // Target amount for the campaign
            $table->text('credentials')->nullable()->after('stripe_key'); // Contact credentials
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campaigns', function (Blueprint $table) {
            $table->dropColumn('goal_amount');
            $table->dropColumn('credentials');
        });
    }
}
