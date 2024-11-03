<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Sign Up</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      width: 300px;
      padding: 20px;
      background-color: white;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
    h2 {
      text-align: center;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-size: 14px;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 8px;
      box-sizing: border-box;
    }
    .toggle-button {
      text-align: center;
      margin-top: 15px;
    }
    .toggle-button button {
      background-color: transparent;
      border: none;
      color: blue;
      cursor: pointer;
    }
    .submit-button {
      width: 100%;
      padding: 8px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 id="form-title">Login</h2>
    <!-- Login Form -->
    <form id="login-form">
      <div class="form-group">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" required>
      </div>
      <div class="form-group">
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" required>
      </div>
      <button type="submit" class="submit-button">Login</button>
    </form>
    <!-- Sign Up Form -->
    <form id="signup-form" style="display: none;">
      <div class="form-group">
        <label for="signup-username">Username:</label>
        <input type="text" id="signup-username" required>
      </div>
      <div class="form-group">
        <label for="signup-email">Email:</label>
        <input type="email" id="signup-email" required>
      </div>
      <div class="form-group">
        <label for="signup-password">Password:</label>
        <input type="password" id="signup-password" required>
      </div>
      <button type="submit" class="submit-button">Sign Up</button>
    </form>
    <div class="toggle-button">
      <button onclick="toggleForm()">Don't have an account? Sign up</button>
    </div>
  </div>

  <script>
    function toggleForm() {
      const loginForm = document.getElementById('login-form');
      const signupForm = document.getElementById('signup-form');
      const formTitle = document.getElementById('form-title');
      const toggleButton = document.querySelector('.toggle-button button');

      if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        signupForm.style.display = 'none';
        formTitle.innerText = 'Login';
        toggleButton.innerText = "Don't have an account? Sign up";
      } else {
        loginForm.style.display = 'none';
        signupForm.style.display = 'block';
        formTitle.innerText = 'Sign Up';
        toggleButton.innerText = 'Already have an account? Login';
      }
    }
  </script>
</body>
</html>
