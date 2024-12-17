@prepend('bootstrap')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endprepend

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'We Do - Task Management')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @stack('bootstrap')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7fc;
        }
        .navbar {
            background-color: #333;
            border: none;
        }
        .navbar-brand,
        .navbar-nav > li > a {
            color: white !important;
            font-size: 18px;
        }
        .navbar-nav > li > a:hover,
        .navbar-nav > li > a:focus {
            background-color: transparent !important;
            color: #ffcc00 !important; /* Custom hover color */
        }
        .content {
            padding: 20px;
        }
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<style>
    /* Reset styles */
    body, ul, li, a {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
        font-family: Arial, sans-serif;
    }

    /* Navbar container */
    .app-navbar {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #222;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        z-index: 1000;
    }

    /* Brand logo */
    .app-brand {
        font-size: 2.5em;
        font-weight: bold;
        color: white;
        padding-left: calc(50% - 500px);
    }

    /* Navbar links container */
    .app-navbar-links {
        padding-right: calc(50% - 500px);
        max-width: max-content;
        display: flex;
        gap: 15px;
    }

    /* Navbar links (button-like styles for large screens) */
    .app-navbar-links a {
        color: white;
        padding: 10px 20px;
        background: linear-gradient(45deg, #ff7f50, #ff4500);
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* Cool hover animation */
    .app-navbar-links a:hover {
        background: linear-gradient(45deg, #ff4500, #ff7f50);
        transform: translateY(-3px);
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
    }

    /* Mobile toggle button */
    .app-navbar-toggle {
        display: none;
        flex-direction: column;
        gap: 4px;
        cursor: pointer;
    }

    .app-navbar-toggle span {
        width: 25px;
        height: 3px;
        background-color: white;
    }

    /* Dropdown menu for mobile */
    .app-navbar-collapse {
        display: none;
        flex-direction: column;
        background-color: #222;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        padding: 10px 0;
    }

    .app-open {
        display: block !important;
    }

    .app-open a {
        display: block !important;
        width: 100%;
        min-width: 100%;
    }

    .app-close {
        display: none !important;
    }

    .app-navbar-collapse a {
        padding: 10px 20px;
        border-bottom: 1px solid #444;
        font-size: 16px;
    }

    .app-navbar-collapse a:last-child {
        border-bottom: none;
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .app-navbar-links:not(.app-open) {
            display: none;
        }

        .app-navbar-toggle {
            display: flex;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        /* Remove button styles for mobile view */
        .app-navbar-links a {
            background: none;
            box-shadow: none;
            padding: 10px 15px;
            font-size: 14px;
        }

        .app-navbar-links a:hover {
            background: #555;
            transform: none;
            box-shadow: none;
        }
    }
</style>

<nav class="app-navbar">
    <!-- Brand -->
    <div class="app-brand" id="brand">
        <a href="{{url('')}}" style="color: inherit;">We&nbsp;Do</a>
    </div>

    <!-- Navbar toggle for mobile -->
    <div class="app-navbar-toggle" id="navbarToggle">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- Navbar links -->
    <div class="app-navbar-links navbar-collapse" id="navbarContent">
        <a href="{{url('')}}" style="color: inherit;" class="app-close" id="brand-link">We&nbsp;Do</a>
        <a href="{{ route('task.create') }}">Create Task</a>
        <a href="{{ route('task.index') }}">View Tasks</a>
        <a href="{{ route('policies') }}">Policies</a>
        <a href="{{ route('chat.index') }}">Chat Now</a>
        <a href="{{ url('blog') }}">Blog</a>
        @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>

<script>
    // Toggle navbar for mobile
    const navbarToggle = document.getElementById('navbarToggle');
    const navbarContent = document.getElementById('navbarContent');
    const brand = document.getElementById('brand');
    const brandLink = document.getElementById('brand-link');

    navbarToggle.addEventListener('click', () => {
        navbarContent.classList.toggle('app-open');
        brand.classList.toggle('app-close');
        brandLink.classList.toggle('app-close');
    });
</script>

    <!-- Content Section -->
    <div class="content" style="margin-top: 70px;">
        @yield('content')
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; {{ date('Y') }} We Do. All rights reserved.</p>
    </div>

</body>
</html>
