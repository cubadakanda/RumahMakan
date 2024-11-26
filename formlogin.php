<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b62f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .login-container h2 {
            color: #5e54e7;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-control:focus {
            border-color: #5e54e7;
            box-shadow: 0 0 0 0.2rem rgba(94, 84, 231, 0.25);
        }
        .btn-primary {
            background-color: #5e54e7;
            border: none;
        }
        .btn-primary:hover {
            background-color: #463a94;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="ceklogin.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
