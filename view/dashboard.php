<?php
session_start();
require "../classes/User.php";

$user = new User;
$all_users =  $user->getAllUsers();


?>

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
    <title>Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
        <div class="col-6">
            <div class="text-center text-uppercase">user list</div>
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($all_users as $user){
                    ?>
                    <tr>
                        <td>
                            <?php
                        if ($user['photo']) {
                        ?>
                            <img src="../assets/images/<?= $user['photo'] ?>" alt="<?= $user['photo'] ?>" class="d-block mx-auto dashboard-photo">
                        <?php
                        } else { ?>
                            <!-- <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i> -->
                            <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"></i>
                        <?php
                        }
                        ?>
                        
                        </td>
                        <td>
                            <?= $user['id']?>
                        </td>
                        <td>
                            <?= $user['first_name']?>
                        </td>
                        <td>
                            <?= $user['last_name']?>
                        </td>
                        <td>
                            <?= $user['username']?>
                        </td>
                        <td>
                            <?php if($user['id'] == $_SESSION['id']){ ?>
                            <a href="edit-user.php" class="btn btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="delete-user.php" class="btn btn-outline-danger"><i class="fa-regular fa-trash-can"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>