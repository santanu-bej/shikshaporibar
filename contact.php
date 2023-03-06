<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/contact.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>contact</title>
</head>

<body>
    <?php
    if(isset($_POST['messagesubmit'])){
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $uname = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];
            $sql = "INSERT INTO usermessages(uname,email,phone,messages,mdatetime) VALUES('$uname','$email','$phone','$message', NOW() );";
            $result = mysqli_query($conn,$sql);
            readfile("./contact.html");
        }
        $conn -> close();
    }
    else{
        readfile("./contact.html");
    }
    ?>
</body>

</html>