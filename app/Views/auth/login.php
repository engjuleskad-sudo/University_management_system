<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Management System </title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h1>University Management System. </h1>
            <h2>Welcome Back</h2>

            <form action="?page=login" method="POST">
                <label>Email</label>
                <input type="email" name="email" placeholder="Enter your email" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>
        </div>

    </div>

    

    <script src="assets/js/app.js"></script>
</body>
</html>