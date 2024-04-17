<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Form</title>
</head>

<body>
<form method="POST" action="">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Login</h4>
                        <form method="POST" action="login.php">
                            <div class="form-group">
                                <label for="username">Email or Phone Number</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Email or Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
</body>

</html>
