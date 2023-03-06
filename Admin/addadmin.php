<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin</title>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $password = password_hash($password,PASSWORD_BCRYPT);

            // echo $password;
            $sql = "INSERT INTO admins (username, admin_password,author_name)  VALUES ('$username','$password','$name');";
            echo $sql;
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "Admin added successfully..";
            }
        }
    }
    else{
        echo '
        <form action="addadmin.php" method="post" class="login-form">
            <input type="email" name="username" id="username" placeholder = "username" required><br><br>
            <input type="text" name="name" id="name" placeholder = "name" required><br><br>
            <input type="password" name="password" id="password" placeholder = "password" required><br><br>
            <input type="submit" value="add">
        </form>
        ';
    }
    ?>
</body>
</html>