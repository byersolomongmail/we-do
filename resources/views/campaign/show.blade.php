@extends('layout.app')

@section('content')
<div class="container">
    <h1>{{ $campaign->name }}</h1>
    <p>{{ $campaign->campaign_text }}</p>

    <p><strong>Goal:</strong> ${{ number_format($campaign->goal_amount, 2) }}</p>
    <p><strong>Collected:</strong> ${{ number_format($campaign->collected_amount, 2) }}</p>

    <div class="progress">
        <div 
            class="progress-bar" 
            role="progressbar" 
            style="width: {{ ($campaign->collected_amount / $campaign->goal_amount) * 100 }}%" 
            aria-valuenow="{{ $campaign->collected_amount }}" 
            aria-valuemin="0" 
            aria-valuemax="{{ $campaign->goal_amount }}">
            {{ number_format(($campaign->collected_amount / $campaign->goal_amount) * 100, 2) }}%
        </div>
    </div>

    <h3>Donate to this Campaign</h3>
    <form action="{{ route('donations.store') }}" method="POST">
        @csrf
        <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">
        
        <div class="form-group">
            <label for="donor_name">Name</label>
            <input type="text" name="donor_name" id="donor_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="donor_email">Email</label>
            <input type="email" name="donor_email" id="donor_email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="donation_amount">Donation Amount</label>
            <input type="number" name="donation_amount" id="donation_amount" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Donate</button>
    </form>
</div>
@endsection
