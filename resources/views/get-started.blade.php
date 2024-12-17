@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    /* Styling for the Get Started page */
.get-started {
    background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
    color: #fff;
    text-align: center;
}

.get-started .title {
    font-size: 2.5rem;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.get-started .description {
    font-size: 1.25rem;
    line-height: 1.6;
    color: #f9f9f9;
    max-width: 600px;
    margin: 0 auto;
}

.get-started .illustration {
    max-width: 250px;
    margin: 20px auto;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.get-started .buttons a {
    transition: all 0.3s ease;
}

.get-started .buttons a:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
}

.get-started .login-btn {
    background-color: #4CAF50;
    border: none;
}

.get-started .login-btn:hover {
    background-color: #45a049;
}

.get-started .register-btn {
    background-color: #f44336;
    border: none;
}

.get-started .register-btn:hover {
    background-color: #e53935;
}

/* Mobile responsiveness */
@media (max-width: 768px) {
    .get-started .title {
        font-size: 2rem;
    }

    .get-started .description {
        font-size: 1rem;
    }

    .get-started .illustration {
        max-width: 200px;
    }

    .get-started .buttons {
        flex-direction: column;
        gap: 15px;
    }
}

</style>
<div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 get-started">
    <div class="text-center">
        <h1 class="mb-4 title">Welcome to Speed WebG</h1>
        <p class="lead mb-4 description">
            Experience lightning-fast performance with our platform. Manage your accounts, register your cards, and stay in control. Let's get started!
        </p>
        <img src="/path-to-speed.webg" alt="Speed WebG Illustration" class="img-fluid illustration">
        <div class="d-flex gap-3 buttons">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg login-btn">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg register-btn">Register</a>
        </div>
    </div>
</div>

@endsection
