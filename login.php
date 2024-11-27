<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Register</title>
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

    .btn {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 4px;
    }
    .btn:hover {
      background-color: #4CAF50;
    }
    .toggle-btn {
      text-align: center;
      margin-top: 15px;
      cursor: pointer;
      color: green;
    }
    .error {
      color: red;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2 id="form-title">Login</h2>
    <div id="error-message" class="error">
      <?php
      session_start();
      if (isset($_SESSION['error'])) {
          echo $_SESSION['error'];
          unset($_SESSION['error']);
      }
      ?>
    </div>
    <!-- Login Form -->
    <form id="login-form" action="loginProcess.php" method="POST" style="display: block;">
      <div class="form-group">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
      </div>
      <div class="form-group">
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="password"required>
      </div>
      <button type="submit" class="btn">Login</button>
    </form>

    <!-- Register Form -->
    <form id="register-form" action="registerProcess.php" method="POST" style="display: none;">
      <div class="form-group">
        <label for="register-username">Username:</label>
        <input type="text" id="register-username" name="username"required>
      </div>
      <div class="form-group">
        <label for="register-email">Email:</label>
        <input type="email" id="register-email" name="email" required>
      </div>
      <div class="form-group">
        <label for="register-password">Password:</label>
        <input type="password" id="register-password" name="password"required>
      </div>
      <div class="form-group">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" id="confirm-password" name="confirm_password" required>
      </div>
      <button type="submit" class="btn">Register</button>
    </form>

    <div class="toggle-btn" onclick="toggleForm()">Don't have an account? Register</div>
  </div>

  <script>
    function toggleForm() {
      const loginForm = document.getElementById('login-form');
      const registerForm = document.getElementById('register-form');
      const formTitle = document.getElementById('form-title');
      const toggleBtn = document.querySelector('.toggle-btn');

      if (loginForm.style.display === 'none') {
        loginForm.style.display = 'block';
        registerForm.style.display = 'none';
        formTitle.innerText = 'Login';
        toggleBtn.innerText = "Don't have an account? Register";
      } else {
        loginForm.style.display = 'none';
        registerForm.style.display = 'block';
        formTitle.innerText = 'Register';
        toggleBtn.innerText = 'Already have an account? Login';
      }
    }
  </script>
</body>
</html>

