<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>LOGIN</title>
</head>

<body class="bg-light">
    <div style="height: 100hv;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-uppercase">login</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" placeholder="USERNAME" maxlength="15" required>
                        </div>
                        <div class="mb-5">
                            <input type="password" class="form-control" name="password" id="password" placeholder="PASSWORD" required minlength="8" aria-describedby="password-info">
                        </div>
                        <button class="btn btn-primary w-100">Log in</button>
                    </form>
                    <p class="text-center mt-3 small"><a class="text-decoration-none" href="./register.php">Create Account</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>