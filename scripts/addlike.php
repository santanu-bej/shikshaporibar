<?php
    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
    if(!$conn){
        die("Failed to connect ". mysqli_connect_error());
    }
    else{
        if(isset($_POST['like']) && isset($_POST['id'])){
            $doc_id = $_POST['id'];
            $sql = "UPDATE docs SET likes = likes+1 WHERE doc_id = $doc_id;";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "done";
            }
            $conn->close();
        }
    }   
?>