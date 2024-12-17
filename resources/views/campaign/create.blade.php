@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create a Campaign</h1>
    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Campaign Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="campaign_text">Campaign Text</label>
            <textarea name="campaign_text" id="campaign_text" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="needs_amount">Needs Amount</label>
            <input type="number" name="needs_amount" id="needs_amount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="top_image">Top Image</label>
            <input type="file" name="top_image" id="top_image" class="form-control">
        </div>
        <div class="form-group">
            <label for="bottom_image">Bottom Image</label>
            <input type="file" name="bottom_image" id="bottom_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create Campaign</button>
    </form>
</div>
@endsection
