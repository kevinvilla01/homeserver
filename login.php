<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <!-- JQUERY -->
    <script src="jquery-3.7.1.min.js"></script>
    <!-- sweetalert -->
    <script src="sweetalert2.all.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>VS - Login</title>
</head>
<body>
    <style>
    body {
    background-color: #f7f9f7;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

    .login-container {
        background: #ffffff;
        border-radius: 10px;
        padding: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #007bff;
    }

    .btn-custom {
        background-color: #007bff;
        border-color: #007bff;
        transition: all 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    </style>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form action="php/valid_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>