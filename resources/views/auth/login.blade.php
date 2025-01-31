<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/assets/images/favicon.png')}}">

    <!-- Google Fonts and Icons -->
    <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Foldit:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: url('{{ asset('home/images/register.jpg') }}') no-repeat center center/cover;

        }

        .login-container {
            background: rgba(255, 228, 130, 0.9);
            padding: 50px;
            /* Increased padding */
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 500px;
            /* Increased width */
            text-align: center;
        }

        .login-header {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-header span {
            font-size: 40px;
            color: #333;
            margin-left: 10px;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .login-form button {
            background: #333;
            color: white;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .login-form button:hover {
            background: #444;
        }

        .forgot-password {
            color: #333;
            font-size: 14px;
            margin-top: 10px;
            cursor: pointer;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .signup-link {
            color: #333;
            font-size: 16px;
            margin-top: 20px;
        }

        .signup-link a {
            color: #444;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }

            .login-header {
                font-size: 24px;
            }

            .login-header span {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">
        <div class="login-header">
            Login <span class="material-icons-outlined">lock</span>
        </div>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div style="position: relative; display: flex; align-items: center;">
                <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    autofocus autocomplete="username" placeholder="Email" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <div class="mt-4">
                <div style="position: relative; display: flex; align-items: center;">
                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                        autocomplete="current-password" placeholder="Password" />
                    <span id="toggle-password" class="material-icons-outlined"
                        style="position: absolute; right: 12px; cursor: pointer;">
                        visibility_off
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
            <div class="forgot-password">
                @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif
            </div>

        </form>
        <div class="signup-link">
            Don’t have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </div>
    </div>
</body>
<script>
    document.getElementById('toggle-password').addEventListener('click', function () {
      const passwordInput = document.getElementById('password');
      const icon = this;

      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.textContent = 'visibility';
      } else {
        passwordInput.type = 'password';
        icon.textContent = 'visibility_off';
      }
    });
</script>

</html>
