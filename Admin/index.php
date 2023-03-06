
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM admins WHERE username = '$username'; ";
            $result = mysqli_query($conn,$sql);
            if($row = mysqli_fetch_assoc($result)){
                $varify = password_verify($password,$row['admin_password']);
                if($varify){
                    readfile('Adminpanal.php');
                }
                else{
                    echo "please enter right password....";
                }
            }
            else{
                echo "User not found..";
            }
        }
    }
    else{
        readfile('AdminLogin.html');
    }
    ?>