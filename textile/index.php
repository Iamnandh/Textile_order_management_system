<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylec.css">

</head>

<body>
    <div class="login-container" id="form-container">
        <h1 id="form-title">Threadconnect login</h1>
        <form method="POST" action="login.php" method="POST" id="login-form">
        <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="organizationtype">Organization Type</label>
                <select id="organizationtype" name="organizationtype" placeholder="Organization Type" required
                    style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    <option value="" disabled selected>Select your organization type</option>
                    <option value="textile">Textile</option>
                    <option value="manufacturer">Manufacturer</option>
                    <option value="transportation">transportation</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="login-button">Login</button>

        </form>
        <form method="POST" id="register-form" action="register.php" style="display: none;">
            <div class="form-group">

                <input type="text" id="texname" name="texname" placeholder="organization name" required>
            </div>
            <div class="form-group">

                <input type="text" id="name" name="name" placeholder="Username" required>
            </div>
            <div class="form-group">

                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">

                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="organizationtype">Organization Type</label>
                <select id="organizationtype" name="organizationtype" placeholder="Organization Type" required
                    style="width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
                    <option value="" disabled selected>Select your organization type</option>
                    <option value="textile">Textile</option>
                    <option value="manufacturer">Manufacturer</option>
                    <option value="transportation">transportation</option>
                </select>
            </div>
            <button type="submit" class="login-button">Sign Up</button>

        </form>
        <p class="toggle" onclick="toggleForm()">Don't have an account? Register</p>
    </div>
    <script>
        function toggleForm() {
            let loginForm = document.getElementById('login-form');
            let registerForm = document.getElementById('register-form');
            let title = document.getElementById('form-title');
            let toggleText = document.querySelector('.toggle');

            if (loginForm.style.display === 'none') {
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
                title.textContent = 'Login';
                toggleText.textContent = "Don't have an account? Register";
            } else {
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
                title.textContent = 'Register';
                toggleText.textContent = "Already have an account? Login";
            }
        }
    </script>
</body>

</html>