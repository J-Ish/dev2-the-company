<?php
session_start();
require "../classes/User.php";

$user_obj = new User;
$user =  $user_obj->getUser();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Edit</title>
</head>

<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h4>The Company</h4>
            </a>
            <div class="navbar nav">
                <li class="nav-item text-light">
                    <?= $_SESSION['username'] ?>
                </li>
                <li class="nav-item">
                    <form action="../actions/logout.php" method="POST" class="d-flex ms-2">
                        <button href="./index.php" class="text-danger nav-link bg-transparent border-0" type="submit">Logout</button>
                    </form>
                </li>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center text-uppercase">edit user</h2>
            <form action="../actions/edit-user.php" method="POST" enctype="multipart/form-data">
                <div class="row justify-content-center mb-3">
                    <div class="col-6">
                        <?php
                        if ($user['photo']) {
                        ?>
                            <img src="../assets/images/<?php echo $user['photo'] ?>" alt="<?php echo $user['photo'] ?>" class="d-block mx-auto edit-photo">
                        <?php
                        } else { ?>
                            <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                        <?php
                        }
                        ?>
                        <input type="file" class="form-control mt-2" accept="image/*" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control mt-2" name="first_name" id="first_name" placeholder="First Name" required autofocus value="<?php echo $user['first_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control mt-2" name="last_name" id="last_name" placeholder="Last Name" required value="<?php echo $user['last_name'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control mt-2" name="username" id="username" placeholder="Username" required value="<?php echo $user['username'] ?>">
                    </div>
                    <div class="text-end">
                        <a href="dashboard.php" class="btn btn-secondary btn-sm px-5">Cancel</a>
                        <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </main>

</body>

</html>