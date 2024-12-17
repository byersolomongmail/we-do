@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            /* display: flex; */
            /* justify-content: center; */
            /* align-items: center; */
            height: 100vh;
            margin: 0;
        }
        .card {
            margin:auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
            box-sizing: border-box;
        }
        .card h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .card form {
            display: grid;
            gap: 15px;
        }
        .card label {
            font-weight: bold;
        }
        .card input, .card textarea, .card select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(100% - 20px);
            resize: vertical;
        }
        .card button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .card button:hover {
            background-color: #45a049;
        }
        .error-message {
            color: red;
            font-size: 12px;
        }
    </style>
    <div class="card">
        <h1>Create Task</h1>

        @if (session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        <form action="{{ route('task.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
                @error('title')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Amount -->
            <div>
                <label for="amount">Amount (in USD):</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}" required>
                @error('amount')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location -->
            <div>
                <label for="location">Location:</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}" required>
                @error('location')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- City -->
            <div>
                <label for="city">City:</label>
                <input type="text" name="city" id="city" value="{{ old('city') }}" required>
                @error('city')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Country -->
            <div>
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="{{ old('country') }}" required>
                @error('country')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Province -->
            <div>
                <label for="province">Province:</label>
                <input type="text" name="province" id="province" value="{{ old('province') }}" required>
                @error('province')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Timeline -->
            <div>
                <label for="timeline">Timeline:</label>
                <input type="datetime-local" name="timeline" id="timeline" value="{{ old('timeline') }}" required>
                @error('timeline')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image">Upload Image (Optional):</label>
                <input type="file" name="image" id="image" accept="image/*">
                @error('image')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit">Submit Task</button>
        </form>
    </div>
@endsection