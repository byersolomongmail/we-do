@extends('layouts.app')

@section('title', 'Dashboard')
@push('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush

@section('content')

<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome Back, ') . Auth::user()->name . '!' }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 mx-auto" style="max-width:800px">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-2xl font-semibold mb-4">Dashboard Overview</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Welcome to your dashboard! Here, you can manage your tasks, monitor campaigns, track donations, and explore exciting new features. Use the navigation bar to access different areas of your account.
                    </p>
                </div>
            </div>

            <!-- Image Carousel -->
            <div class="bg-white shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-4">Explore Our Gallery</h3>
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="false">
                        <!-- Carousel Indicators -->
                        <div class="carousel-indicators">
                            @for ($i = 0; $i < 9; $i++)
                                <button type="button" data-bs-target="#imageCarousel" data-bs-slide-to="{{ $i }}" 
                                    class="{{ $i === 0 ? 'active' : '' }}" 
                                    aria-current="{{ $i === 0 ? 'true' : 'false' }}" 
                                    aria-label="Slide {{ $i + 1 }}"></button>
                            @endfor
                        </div>

                        <!-- Carousel Items -->
                        <div class="carousel-inner">
                            @for ($i = 1; $i <= 9; $i++)
                                <div class="carousel-item {{ $i === 1 ? 'active' : '' }}">
                                    <img src="{{ asset('images/image' . $i . '.jpg') }}" 
                                         class="d-block w-100 h-96 object-cover rounded-lg shadow-md" 
                                         alt="Gallery Image {{ $i }}">
                                </div>
                            @endfor
                        </div>

                        <!-- Carousel Controls -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="quick-links-container">
    <div class="quick-links-header">
        <h3>Quick Links</h3>
    </div>
    <div class="quick-links">
        <a href="{{ route('task.index') }}" class="quick-link-card task">
            <div class="card-content">
                <span>Manage Tasks</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
        </a>
        <a href="{{ route('campaigns.index') }}" class="quick-link-card campaign">
            <div class="card-content">
                <span>View Campaigns</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
        </a>
        <a href="{{ route('donations.index') }}" class="quick-link-card donations">
            <div class="card-content">
                <span>Track Donations</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </div>
        </a>
    </div>
</div>

<style>
    .quick-links-container {
        margin-top: 30px;
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
    }

    .quick-links-header {
        margin-bottom: 20px;
    }

    .quick-links-header h3 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
    }

    .quick-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .quick-link-card {
        background: #f3f4f6;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .quick-link-card:hover {
        background: white;
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .quick-link-card span {
        font-size: 1.2rem;
        font-weight: 500;
        color: #333;
    }

    .icon {
        width: 24px;
        height: 24px;
        stroke: #333;
    }

    /* Color variations */
    .task {
        background: linear-gradient(145deg, blue, #335e85);
        color: white;
    }

    .campaign {
        background: linear-gradient(145deg, blue, #10b981);
        color: white;
    }

    .donations {
        background: linear-gradient(145deg,blue, #03fcf8);
        color: white;
    }
    .card-content span,.card-content svg{
        color:inherit!important;
    }
    .card-content{
        color:inherit;
    }
    .quick-link-card{
        color:white;
    }
    .quick-link-card:hover{
        color:black!important;
    }
</style>


        </div>
    </div>
@endsection
