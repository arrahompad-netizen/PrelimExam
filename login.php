```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login on my System</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            color: #222;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            font-size: 15px;
        }

        .input-group input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            padding-right: 60px;
        }

        .show-btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #2563eb;
            cursor: pointer;
        }

        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .remember {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .options a {
            color: #2563eb;
            text-decoration: none;
        }

        .login-btn {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .login-btn:hover {
            background: #1d4ed8;
        }

        .message {
            display: none;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error {
            display: block;
            background: #fee2e2;
            color: #dc2626;
        }

        .success {
            display: block;
            background: #dcfce7;
            color: #16a34a;
        }

        .demo {
            margin-top: 25px;
            padding: 12px;
            background: #f3f4f6;
            border-radius: 8px;
            text-align: center;
            font-size: 13px;
            color: #555;
        }

        /* Dashboard */
        #dashboard {
            display: none;
            width: 100%;
            min-height: 100vh;
            background: #f3f4f6;
        }

        .navbar {
            background: #2563eb;
            color: white;
            padding: 18px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            color: white;
        }

        .logout-btn {
            padding: 10px 18px;
            border: none;
            border-radius: 7px;
            background: white;
            color: #2563eb;
            cursor: pointer;
            font-weight: bold;
        }

        .dashboard-content {
            padding: 40px;
        }

        .welcome-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        @media (max-width: 450px) {
            .login-box {
                width: 90%;
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>

    <!-- LOGIN PAGE -->
    <div class="login-box" id="loginPage">

        <div class="logo">L</div>

        <h2>Welcome Back</h2>

        <p class="subtitle">
            Login to your account
        </p>

        <div id="message" class="message"></div>

        <form id="loginForm">

            <div class="input-group">
                <label>Username</label>

                <input
                    type="text"
                    id="username"
                    placeholder="Enter username"
                    required
                >
            </div>

            <div class="input-group">

                <label>Password</label>

                <div class="password-container">

                    <input
                        type="password"
                        id="password"
                        placeholder="Enter password"
                        required
                    >

                    <button
                        type="button"
                        class="show-btn"
                        onclick="showPassword()"
                    >
                        Show
                    </button>

                </div>

            </div>

            <div class="options">

                <label class="remember">
                    <input type="checkbox" id="remember">
                    Remember me
                </label>

                <a href="#" onclick="forgotPassword()">
                    Forgot Password?
                </a>

            </div>

            <button type="submit" class="login-btn">
                Login
            </button>

        </form>

        <div class="demo">
            <strong>Demo Login</strong><br>
            Username: admin<br>
            Password: 123456
        </div>

    </div>


    <!-- DASHBOARD -->
    <div id="dashboard">

        <div class="navbar">

            <h2>My Dashboard</h2>

            <button
                class="logout-btn"
                onclick="logout()"
            >
                Logout
            </button>

        </div>

        <div class="dashboard-content">

            <div class="welcome-card">

                <h1>Welcome, Admin! 👋</h1>

                <br>

                <p>
                    You have successfully logged in.
                </p>

            </div>

        </div>

    </div>


    <script>

        // LOGIN
        document
            .getElementById("loginForm")
            .addEventListener("submit", function(event) {

                event.preventDefault();

                const username =
                    document.getElementById("username").value.trim();

                const password =
                    document.getElementById("password").value;

                const remember =
                    document.getElementById("remember").checked;

                const message =
                    document.getElementById("message");


                // DEMO ACCOUNT
                const correctUsername = "admin";
                const correctPassword = "123456";


                if (
                    username === correctUsername &&
                    password === correctPassword
                ) {

                    message.className = "message success";

                    message.textContent =
                        "Login successful!";

                    // Save login
                    if (remember) {

                        localStorage.setItem(
                            "loggedIn",
                            "true"
                        );

                    } else {

                        sessionStorage.setItem(
                            "loggedIn",
                            "true"
                        );

                    }

                    // Show dashboard
                    setTimeout(function() {

                        document.getElementById(
                            "loginPage"
                        ).style.display = "none";

                        document.getElementById(
                            "dashboard"
                        ).style.display = "block";

                    }, 500);

                } else {

                    message.className = "message error";

                    message.textContent =
                        "Invalid username or password.";

                }

            });


        // SHOW / HIDE PASSWORD
        function showPassword() {

            const password =
                document.getElementById("password");

            const button =
                document.querySelector(".show-btn");


            if (password.type === "password") {

                password.type = "text";
                button.textContent = "Hide";

            } else {

                password.type = "password";
                button.textContent = "Show";

            }

        }


        // FORGOT PASSWORD
        function forgotPassword() {

            alert(
                "Please contact the administrator to reset your password."
            );

        }


        // LOGOUT
        function logout() {

            localStorage.removeItem("loggedIn");

            sessionStorage.removeItem("loggedIn");

            document.getElementById(
                "dashboard"
            ).style.display = "none";

            document.getElementById(
                "loginPage"
            ).style.display = "block";

            document.getElementById(
                "loginForm"
            ).reset();

        }

    </script>

</body>
</html>
```
