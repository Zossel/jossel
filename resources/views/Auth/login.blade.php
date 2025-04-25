<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            background: white;
            padding: 30px;
            max-width: 400px;
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-weight: 500;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            margin-bottom: 20px;
            outline: none;
            font-size: 15px;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #1d4ed8;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .success {
            background-color: #dcfce7;
            color: #166534;
        }

        .error {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #2563eb;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-box">
        <h2>Login to Your Account</h2>

        <!-- Example Laravel Blade messages -->
        @if(session('success'))
            <div class="message success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="you@example.com" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                Don't have an account?
                <a href="{{ route('register') }}">Register here</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>