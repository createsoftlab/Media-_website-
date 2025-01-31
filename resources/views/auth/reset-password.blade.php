<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>

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
            background: url('{{ asset(' home/images/register.jpg') }}') no-repeat center center/cover;
            font-family: 'Poppins', sans-serif;
        }

        .reset-container {
            background: rgba(255, 228, 130, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 400px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center children horizontally */
        }

        .reset-header {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .reset-header span {
            font-size: 40px;
            color: #333;
            margin-left: 10px;
        }

        .reset-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            /* Ensure form takes the full width of the container */
        }

        .reset-form input {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            outline: none;
        }

        .reset-form button {
            background: #333;
            color: white;
            padding: 12px;
            font-size: 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
            width: 100%;
            /* Make the button match input width */
        }

        .reset-form button:hover {
            background: #444;
        }

        .back-to-login {
            color: #333;
            font-size: 14px;
            margin-top: 20px;
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
        @media (max-width: 600px) {
            .reset-container {
                width: 90%;
                padding: 30px;
            }

            .reset-header {
                font-size: 24px;
            }

            .reset-header span {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <div class="reset-container">
        <div class="reset-header">
            Create New Password <span class="material-icons-outlined">lock_reset</span>
        </div>
        <form method="POST" action="{{ route('password.store') }}" class="reset-form">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <div style="position: relative; display: flex; align-items: center;">
                    <x-text-input id="email" class="block w-full mt-1" type="email" name="email"
                        :value="old('email', $request->email)" autofocus autocomplete="username" placeholder="Email" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <div style="position: relative; display: flex; align-items: center;">
                    <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                        autocomplete="new-password" placeholder="New Password" />
                    <span id="toggle-password" class="material-icons-outlined"
                        style="position: absolute; right: 12px; cursor: pointer;">
                        visibility_off
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div>
                <div style="position: relative; display: flex; align-items: center;">
                    <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                        name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" />
                    <span id="toggle-confirm-password" class="material-icons-outlined"
                        style="position: absolute; right: 12px; cursor: pointer;">
                        visibility_off
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>


            <!-- Reset Button -->
            <button type="submit">Reset Password</button>

        </form>
        <div class="back-to-login">
            <a href="{{ route('login') }}">Back to Login</a>
        </div>
    </div>

    <script>
        // Toggle new password visibility
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

        // Toggle confirm password visibility
        document.getElementById('toggle-confirm-password').addEventListener('click', function () {
          const confirmPasswordInput = document.getElementById('password_confirmation');
          const icon = this;

          if (confirmPasswordInput.type === 'password') {
            confirmPasswordInput.type = 'text';
            icon.textContent = 'visibility';
          } else {
            confirmPasswordInput.type = 'password';
            icon.textContent = 'visibility_off';
          }
        });
      </script>


</body>

</html>
