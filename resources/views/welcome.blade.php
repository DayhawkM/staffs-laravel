<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Pizza World</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff3f8;
            font-family: 'Nunito', sans-serif;
            min-height: 100%;
        }
        .container {
            width: 100%;
            max-width: 960px;
            padding: 40px 20px; /* Increased padding around the content */
            box-sizing: border-box; /* Includes padding in width calculation */
            display: flex;
            justify-content: space-around;
            align-items: flex-start; /* Aligns content to the top */
        }
        .column {
            flex: 1;
            padding: 0 20px;
        }
        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-top: 0; /* Adjusted margin for better positioning */
            padding-bottom: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin-top: 0;
        }
        li {
            background: #ffc0cb;
            margin: 8px 0;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        li:hover {
            transform: scale(1.05);
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 10px; /* Adjusted top position for better visibility */
        }
        .link {
            color: #555;
            font-weight: bold;
            text-decoration: none;
            background: #f8bbd0;
            padding: 8px 16px;
            border-radius: 20px;
            margin-right: 10px; /* Adjusted margin for spacing links */
        }
        .link:hover {
            background: #f48fb1;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="top-right links">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="link">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="link">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="link">Register</a>
                @endif
            @endauth
        @endif
    </div>
    <div class="container">
        <div class="column">
            <h1>Available Pizzas</h1>
            <ul>
                @foreach ($pizzas as $pizza)
                    <li>{{ $pizza->name }} - Small £{{ $pizza->s_price }} - Medium £{{ $pizza->m_price }} - Large £{{ $pizza->l_price }}</li>
                @endforeach
            </ul>
        </div>
        <div class="column">
            <h1>Toppings</h1>
            <ul>
                @foreach ($toppings as $topping)
                    <li>{{ $topping->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>