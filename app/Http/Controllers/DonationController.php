<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email|max:255',
            'donation_amount' => 'required|numeric|min:1',
        ]);

        $campaign = Campaign::findOrFail($request->campaign_id);

        // Create the donation
        $donation = Donation::create([
            'campaign_id' => $campaign->id,
            'donor_name' => $request->donor_name,
            'donor_email' => $request->donor_email,
            'donation_amount' => $request->donation_amount,
        ]);

        // Update campaign's collected amount
        $campaign->update([
            'collected_amount' => $campaign->collected_amount + $request->donation_amount,
        ]);

        return redirect()->route('campaigns.show', $campaign->id)->with('success', 'Donation successful!');
    }
}
