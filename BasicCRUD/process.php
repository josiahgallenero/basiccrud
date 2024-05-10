<?php
include "conn.php";

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $insert = mysqli_query($conn, "INSERT INTO basiccrud VALUES(0, '$email', '$username', '$password')");

    if($insert == true){
        ?>
        <script>
            alert("Register Successfully!");
            location.href= "index.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Register Error!");
            location.href= "index.php";
        </script>
        <?php
    }
}

if(isset($_POST['login'])){
    $email = $_POST['emaill'];
    $password = $_POST['passwordd'];

    $validate = mysqli_query($conn, "SELECT * FROM basiccrud WHERE '$email' = email AND '$password' = password ");

    $check = mysqli_num_rows($validate);
    if ($check >= 1){
        ?>
        <script>
            alert("Login Successfully!");
            location.href = "profile.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Login Error!");
            location.href = "index.php";
        </script>
        <?php
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $update = mysqli_query($conn, "UPDATE basiccrud SET email = '$email', username = '$username', password = '$password' WHERE id = $id");

    if ($update) {
        ?>
        <script>
            alert("Update Successful!");
            location.href = "profile.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error Updating!");
            location.href = "profile.php";
        </script>
        <?php
    }
}

if (isset($_POST['remove'])) {
    $id = $_POST['id'];

    $delete = mysqli_query($conn, "DELETE FROM basiccrud WHERE id = $id");

    if ($delete) {
        ?>
        <script>
            alert("Removed Successful!");
            location.href = "profile.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Error Removing!");
            location.href = "profile.php";
        </script>
        <?php
    }
}

?>