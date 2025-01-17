<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Forgot Password page to reset your account password securely.">
    <title>Forgot Password</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/assets/images/favicon.png')}}">

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Foldit:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* General Reset */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('{{ asset('home/images/register.jpg') }}') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
        }

        /* Container */
        .forgot-password-container {
            background: rgba(255, 228, 130, 0.95);
            padding: 50px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            width: 500px;
            max-width: 90%;
            text-align: center;
        }

        /* Header */
        .forgot-password-header {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .forgot-password-header .material-icons-outlined {
            font-size: 2.4rem;
            color: #333;
            margin-left: 10px;
        }

        /* Description */
        .forgot-password-description {
            margin-bottom: 25px;
            font-size: 1rem;
            color: #555;
        }

        /* Form */
        .forgot-password-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .forgot-password-form input {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            font-size: 1.1rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            outline: none;
            transition: border 0.3s, box-shadow 0.3s;
        }

        .forgot-password-form input:focus {
            border-color: #333;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.2);
        }

        .forgot-password-form button {
            width: 100%;
            max-width: 400px;
            background: #333;
            color: white;
            padding: 15px;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .forgot-password-form button:hover {
            background: #444;
            transform: scale(1.03);
        }

        /* Back to Login */
        .back-to-login {
            color: #333;
            font-size: 0.95rem;
            margin-top: 15px;
        }

        .back-to-login a {
            color: #444;
            text-decoration: none;
            font-weight: bold;
        }

        .back-to-login a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .forgot-password-container {
                padding: 40px;
            }

            .forgot-password-header {
                font-size: 1.8rem;
            }

            .forgot-password-header .material-icons-outlined {
                font-size: 2rem;
            }

            .forgot-password-description {
                font-size: 0.95rem;
            }

            .forgot-password-form input, .forgot-password-form button {
                font-size: 1rem;
                padding: 12px;
            }
        }

        @media (max-width: 480px) {
            .forgot-password-container {
                padding: 30px;
            }

            .forgot-password-header {
                font-size: 1.5rem;
            }

            .forgot-password-header .material-icons-outlined {
                font-size: 1.8rem;
            }

            .forgot-password-description {
                font-size: 0.9rem;
            }

            .forgot-password-form input, .forgot-password-form button {
                font-size: 0.95rem;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <div class="forgot-password-header">
            Forgot Password <span class="material-icons-outlined">lock_reset</span>
        </div>
        <p class="forgot-password-description">
            No problem. Just let us know your email address, and we’ll email you a password reset link so you can choose a new one.
        </p>
        <form method="POST" action="{{ route('password.email') }}" class="forgot-password-form">
            @csrf
            <!-- Email Address -->
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
                required
                aria-label="Email Address"
                autofocus>
            @error('email')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror

            <!-- Submit Button -->
            <button type="submit">
                Email Password Reset Link
            </button>
        </form>
        <div class="back-to-login">
            Remember your password? <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>
</body>
</html>
