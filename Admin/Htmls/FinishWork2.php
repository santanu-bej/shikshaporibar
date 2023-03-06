<?php
    $desc = $_POST['description'];
    $doc_id = $_GET['id'];
    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
    if(!$conn){
        die("Failed to connect ". mysqli_connect_error());
    }
    else{
        $targetfolder = "..\..\Suggestions\\";
        // $targetfolder ="http:\\shikshaporibar.in\Suggestions\\";
        $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
    
        $ok=1;
    
        $file_type=$_FILES['file']['type'];
    
        if ($file_type=="application/pdf") {
    
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
    
        {
            $fileName = $_FILES['file']['name'];
            $htmldir = "..\..\SuggDeschtml\\";
            // $htmldir = DOCROOT . "\SuggDeschtml\\";
            // $htmldir = dirname( dirname(__FILE__));
            // echo $htmldir;
            $descFile = "deschtml".$doc_id.".html";
            $htfile = fopen($htmldir.$descFile,"w");
            fwrite($htfile,$desc);
            fclose($htfile);
            $sql = "INSERT INTO suggestions(s_id,pdf_name,descrip) VALUES ($doc_id,'$fileName','$descFile');";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<center><h1>The file ". basename( $_FILES['file']['name']). " is uploaded</h1><center>";
                // echo '
                //     <script>
                //         location.href = "'.$htmldir.'";
                //     </script>
                // ';
            }
        }
        else {
        echo "Problem uploading file";
        }
        }
        else {
        echo "You may only upload PDFs files.<br>";
        }
        // echo '
        //     <script>
        //         location.href = "'.$htmldir.'";
        //     </script>
        //  ';
        $conn -> close();
    }

?>