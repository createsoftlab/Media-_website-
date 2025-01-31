<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('home/assets/images/favicon.png')}}">


    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

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

      .signup-container {
        background: rgba(255, 228, 130, 0.9);
        padding: 50px; /* Increased padding */
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        width: 500px; /* Increased width */
        text-align: center;
    }


      .signup-header {
        font-size: 32px;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .signup-header span {
        font-size: 40px;
        color: #333;
        margin-left: 10px;
      }

      .signup-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .signup-form input {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        border: none;
        border-radius: 6px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        outline: none;
      }

      .signup-form button {
        background: #333;
        color: white;
        padding: 12px;
        font-size: 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
      }

      .signup-form button:hover {
        background: #444;
      }

      .login-link {
        color: #333;
        font-size: 16px;
        margin-top: 20px;
      }

      .login-link a {
        color: #444;
        text-decoration: none;
        font-weight: bold;
      }

      .login-link a:hover {
        text-decoration: underline;
      }

      /* Responsive Design */
      @media (max-width: 600px) {
        .signup-container {
          width: 90%;
          padding: 30px;
        }

        .signup-header {
          font-size: 24px;
        }

        .signup-header span {
          font-size: 32px;
        }
      }
    </style>
</head>
<body>

  <div class="signup-container">
    <div class="signup-header">
      Register <span class="material-icons-outlined">person_add</span>
    </div>
    <form class="signup-form" method="POST" action="{{ route('register') }}">
        @csrf
      <!-- Name -->
      <div>
        <div style="position: relative; display: flex; align-items: center;">
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" autofocus autocomplete="name" placeholder="Name"/>
        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2 " />
      </div>
      <!-- Username -->
      <div>
        <div style="position: relative; display: flex; align-items: center;">
            <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username')" autofocus autocomplete="name" placeholder="Username"/>
        </div>
        <x-input-error :messages="$errors->get('username')" class="mt-2 " />
      </div>

    <!-- Email Address -->
    <div class="mt-4">
        <div style="position: relative; display: flex; align-items: center;">
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                autocomplete="username" placeholder="Email" />
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2 " />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <div style="position: relative; display: flex; align-items: center;">
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password"
                autocomplete="new-password" placeholder="Password" />
            <span id="toggle-password" class="material-icons-outlined"
                style="position: absolute; right: 12px; cursor: pointer;">
                visibility_off
            </span>
        </div>
        <small id="password-error" style="color: red; display: block; font-size: 0.75rem; margin-top: 5px;"></small>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <div style="position: relative; display: flex; align-items: center;">
            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation"
                autocomplete="new-password" placeholder="Confirm Password" />
            <span id="toggle-confirm-password" class="material-icons-outlined"
                style="position: absolute; right: 12px; cursor: pointer;">
                visibility_off
            </span>
        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <button type="submit">Register</button>
    </form>

    <div class="login-link">
      Already have an account? <a href="{{ route('login') }}">Log in</a>
    </div>
  </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
      // Toggle visibility for both password and confirm password
      const toggleVisibility = (inputId, toggleId) => {
        const input = document.getElementById(inputId);
        const toggle = document.getElementById(toggleId);

        toggle.addEventListener("click", function () {
          const type = input.type === "password" ? "text" : "password";
          input.type = type;
          toggle.textContent = type === "password" ? "visibility_off" : "visibility";
        });
      };

      toggleVisibility("password", "toggle-password");
      toggleVisibility("password_confirmation", "toggle-confirm-password");

      // Password validation logic
      const passwordInput = document.getElementById("password");
      const passwordError = document.getElementById("password-error");

      const conditions = {
        length: false,
        uppercase: false,
        lowercase: false,
        number: false,
      };

      const validatePassword = () => {
        const password = passwordInput.value;

        // Check conditions
        conditions.length = password.length >= 8;
        conditions.uppercase = /[A-Z]/.test(password);
        conditions.lowercase = /[a-z]/.test(password);
        conditions.number = /\d/.test(password);

        // Build the message
        let message = [];
        if (!conditions.length) message.push("8+ characters");
        if (!conditions.uppercase) message.push("Uppercase letter");
        if (!conditions.lowercase) message.push("Lowercase letter");
        if (!conditions.number) message.push("Number");

        // Display message
        if (message.length > 0) {
          passwordError.textContent = "Password must include: " + message.join(", ");
          passwordError.style.display = "block";
        } else {
          passwordError.textContent = "";
          passwordError.style.display = "none";
        }
      };

      passwordInput.addEventListener("input", validatePassword);
    });
  </script>

</body>
</html>
