<?php

include "conn.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        .container h1{
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Basic User Management</h1>
        <table class="table">  
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $get_data = mysqli_query($conn, "SELECT * FROM basiccrud");
            if(mysqli_num_rows($get_data) > 0 ){
            ?>
            <tbody>
                <?php
                    $get_data = mysqli_query($conn, "SELECT * FROM basiccrud");
                    while ($data = mysqli_fetch_array($get_data)) {
                    ?>
                    <tr>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php echo $data['password']; ?></td>
                        <td class="action-buttons">
                            <form action="process.php" method="POST">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="action" value="update">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal<?= $data['id'] ?>">Update</button>
                            </form>
                            <form action="process.php" method="POST">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <input type="hidden" name="action" value="remove">
                                <button type="submit" class="btn btn-danger" name="remove">Remove</button>
                            </form>
                        </td>
                    </tr>

                    <div class="modal fade" id="updateModal<?= $data['id'] ?>" tabindex="-1" aria-labelledby="updateModalLabel<?= $data['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updateModalLabel<?= $data['id'] ?>">Update User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="process.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <input type="hidden" name="action" value="update">
                                        <div class="mb-3">
                                            <label for="updateEmail<?= $data['id'] ?>" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="updateEmail<?= $data['id'] ?>" name="email" value="<?= $data['email'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updateUsername<?= $data['id'] ?>" class="form-label">Username</label>
                                            <input type="text" class="form-control" id="updateUsername<?= $data['id'] ?>" name="username" value="<?= $data['username'] ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="updatePassword<?= $data['id'] ?>" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="updatePassword<?= $data['id'] ?>" name="password" value="<?= $data['password'] ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </tbody>
        <?php
            }
        ?>
    </table>
    <?php
    } else {
        echo '<p class="text-center">No record found!</p>';
    }
    ?>
</div>
</body>
</html>