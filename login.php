<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
        <title>Testing CRUD | Login</title>
    </head>
    <body>
     
        <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="card p-5  rounded-full shadow-sm">
                <div class="card-title fw-bold text-center">
                    <h3>LOGIN</h3>
                </div>
                <form action="POST" class="form" id="login-form">
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Username</label>    
                        <input type="text" class="form-control" name="username" placeholder="Username" required >
                    </div>
                    <div class="mb-3 form-group">
                        <label for="username" class="form-label">Password</label>    
                        <input type="password" class="form-control" name="password" placeholder="Password" required >
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary w-100" type="submit" id="login-btn">Login</button>
                        <a href="signup.php" class="btn btn-secondary w-100"  id="signup-btn">Signup</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="assets/js/login.js"></script>
    </body>
</html>
