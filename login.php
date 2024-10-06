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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="login-container">
                    <h2>Login</h2>
                    <form action="your_login_script.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Login</button>
                    </form>
                    <div class="login-footer mt-4">
                        <p>Don't have an account? <a href="#">Sign up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>