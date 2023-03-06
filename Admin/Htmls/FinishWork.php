<?php
    $doc_id= $_GET['id'];
   $questions = $_POST['question'];
   $op1 = $_POST['option1'];
   $op2 = $_POST['option2'];
   $op3 = $_POST['option3'];
   $op4 = $_POST['option4'];
   $opc = $_POST['correct'];

   $Iter = new MultipleIterator ();
   $Iter->attachIterator( new ArrayIterator($questions));
   $Iter->attachIterator( new ArrayIterator($op1));
   $Iter->attachIterator( new ArrayIterator($op2));
   $Iter->attachIterator( new ArrayIterator($op3));
   $Iter->attachIterator( new ArrayIterator($op4));
   $Iter->attachIterator( new ArrayIterator($opc));
    foreach($Iter as $q){
        echo "$q[0] : $q[1] : $q[2] : $q[3] : $q[4] : $q[5]"."<br>";
    }

    $description = $_POST['description'];
    $topic = $_POST['topic'];
    // echo $description."\n";
    // echo $topic;

    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
    if(!$conn){
        die("Failed to connect ". mysqli_connect_error());
    }
    else{
        //creating questin table
        $t_name = 'Questions'.$doc_id;
        $sql3 = "CREATE TABLE $t_name(
            q_id INT auto_increment PRIMARY KEY NOT NULL,
            ques TEXT NOT NULL,
            op1 TEXT NOT NULL, 
            op2 TEXT NOT NULL,
            op3 TEXT NOT NULL, 
            op4 TEXT NOT NULL,
            correctop INT NOT NULL
            );";
        $result = mysqli_query($conn,$sql3);
        if($result){
            // insert table name to quizes table 
            $t_name = $conn->real_escape_string($t_name);
            $description = $conn->real_escape_string($description);
            $topic = $conn->real_escape_string($topic);
            $sql4 = "INSERT INTO quizes(q_id , t_name, descrip, topic) VALUES($doc_id,'$t_name','$description','$topic');";
            // echo $sql4."<br>";
            $result = mysqli_query($conn,$sql4);
            if($result){
                $qid = 1;
                foreach($Iter as $q){
                    $ques = $conn->real_escape_string($q[0]);
                    $op_1 = $conn->real_escape_string($q[1]);
                    $op_2 = $conn->real_escape_string($q[2]);
                    $op_3 = $conn->real_escape_string($q[3]);
                    $op_4 = $conn->real_escape_string($q[4]);
                    $op_c = $q[5];
                    $sql5 = "INSERT INTO $t_name (q_id , ques ,op1 ,op2,op3,op4,correctop) VALUES ($qid,'$ques','$op_1','$op_2','$op_3','$op_4',$op_c);";
                    $qid = $qid + 1;
                    $r = mysqli_query($conn,$sql5);
                    if(!$r){
                        echo "there are some error please contact to the developer..";
                    }
                }
            }
            echo "YOU Have successfully create a quiz row";
        }
        else{
            echo "failed to creat question please try again.";
        }

    }
?>