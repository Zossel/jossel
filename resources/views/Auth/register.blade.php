<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: white;
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            color: #2d3748;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            color: #4a5568;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            outline: none;
            transition: all 0.2s ease;
        }

        input:focus {
            border-color: #3182ce;
            box-shadow: 0 0 0 2px rgba(49, 130, 206, 0.4);
        }

        .error {
            color: #f56565;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .success {
            background-color: #f0fff4;
            color: #48bb78;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border-radius: 6px;
        }

        button {
            width: 100%;
            padding: 1rem;
            background-color: #3182ce;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        button:hover {
            background-color: #2b6cb0;
        }

        .login-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: #4a5568;
        }

        .login-link a {
            color: #3182ce;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Create an Account</h2>

        <!-- Success message (example) -->
        <div class="success">
            Registration successful!
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" type="text" placeholder="Your full name" />
                @error('name')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input name="email" id="email" type="email" placeholder="you@example.com" />
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" id="password" type="password" placeholder="Password" />
                @error('password')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm Password" />
            </div>

            <button type="submit">Register</button>

            <div class="login-link">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </form>
    </div>

</body>
</html>