<?php
require_once "Database.php";

class User extends Database
{
    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = password_hash($request['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users`  (`first_name`,`last_name`,`username`,`password`)VALUES('$first_name','$last_name','$username','$password')";

        if ($this->conn->query($sql)) {
            header("location: ../view");
            exit;
        } else {
            die("Unable to Connect to the database:" . $this->conn->connect_error);
        }
    }

    public function login($request)
    {
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE `username` = '$username'";

        if ($result = $this->conn->query($sql)) {

            if ($result->num_rows == 1) {

                $user = $result->fetch_assoc();

                if (password_verify($password, $user['password'])) {

                    session_start();

                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['fullname'] = $user['first_name'] . "" . $user['last_name'];

                    header("location:../view/dashboard.php");
                    exit;
                } else {
                    // if password do not match
                    echo "<div class='alert alert-danger'>Incorrect Password</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>User not found</div>";
            }
        } else {
            die("Error retriving user :" . $this->conn->connect_error);
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("location: ../view");
        exit;
    }

    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die("Error retriving the error:" . $this->conn->error);
        }
    }

    public function getUser()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE `id` = '$id'";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die("Error retriving User:" . $this->conn->error);
        }
    }

    public function update($request, $files)
    {
        session_start();

        $id = $_SESSION['id'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $tmp_name = $files['photo']['tmp_name'];


        $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username' WHERE `id` = '$id'";

        if ($this->conn->query($sql)) {
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = $first_name . " " . $last_name;

            // if we upload a photo
            if ($photo) {
                $sql = "UPDATE `users` SET `photo`='$photo' WHERE `id` = '$id'";
                $destination = "../assets/images/$photo";

                //query the update for the photo
                if ($this->conn->query($sql)) {

                    if (move_uploaded_file($tmp_name, $destination)) {
                        header("location: ../view/dashboard.php");
                        exit;
                    } else {
                        die("Error moving the photo.");
                    }
                } else {
                    die("Error Updating the photo:" . $this->conn->error);
                }
            } else {
                header("location: ../view/dashboard.php");
                exit;
            }
        } else {
            die("Error Updating the user:" . $this->conn->error);
        }
    }

    public function delete()
    {
        session_start();

        $id = $_SESSION['id'];

        $sql = "DELETE FROM `users` WHERE `id` = '$id'";

        if($this->conn->query($sql)){
            $this->logout();
        }else {
            die("Error Deleting your account:" . $this->conn->error);
        }
    }
}
