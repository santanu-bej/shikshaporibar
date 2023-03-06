<?php
    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
    if(!$conn){
        die("Failed to connect ". mysqli_connect_error());
    }
    else{
        if(isset($_POST['vr']) && $_POST['vr']=='false'){
            $index = $_POST['index'];

            $table_name = $_POST['table'];
            $sql = "SELECT * FROM $table_name LIMIT $index,1;";
            $result = mysqli_query($conn,$sql);
            if($result){
            $q_data = mysqli_fetch_assoc($result);
            $template = '
                <script> val = '.$q_data['timelimit'].' </script>
                <div class="questin-number-of-questions">
                    <div class="question" id="question">
                        '.$q_data['ques'].'
                    </div>
                </div>
                <div class="options">
                    <div class="option ops" id="op1" onclick="option(1)">'.$q_data['op1'].'</div>
                    <div class="option ops" id="op2" onclick="option(2)">'.$q_data['op2'].'</div>
                    <div class="option ops" id="op3" onclick="option(3)">'.$q_data['op3'].'</div>
                    <div class="option ops" id="op4" onclick="option(4)">'.$q_data['op4'].'</div>
                </div>
                ';
                echo $template;
            }
        }
        if(isset($_POST['vr']) && $_POST['vr']=='true'){
            $index = $_POST['index'];
            $table_name = $_POST['table'];
            $sql = "SELECT * FROM $table_name LIMIT $index,1;";
            $result = mysqli_query($conn,$sql);
            if($result){
                $q_data = mysqli_fetch_assoc($result);
                echo $q_data['correctop'];
            }
        }
    }   
?>