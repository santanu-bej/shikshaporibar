<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./AdminStyles/addquestions.css">
    <title>add new questions</title>
</head>
<?php
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        $doc_id;
        $t_name;
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $sql = "SELECT MAX(doc_id) from docs;";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            $doc_id = $row[0];
            $doc_id = $doc_id+1;
            if(isset($_FILES["thumb"]) && $_FILES["thumb"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["thumb"]["name"];
                $filename = 'Thumb'.$doc_id.'.' . pathinfo($_FILES['thumb']['name'],PATHINFO_EXTENSION);
                $filetype = $_FILES["thumb"]["type"];
                $filesize = $_FILES["thumb"]["size"];
            
                // Validate file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)){
                    die("Error: Please select a valid file format.");  
                }
            
                // Validate file size - 10MB maximum
                $maxsize = 10 * 1024 * 1024;
                if($filesize > $maxsize){
                    die("Error: File size is larger than the allowed limit.");
                }
                if(in_array($filetype, $allowed)){
                    if(file_exists("../Thumbnail/" . $filename)){
                        // echo $filename . " is already exists.";
                        // readfile("./Htmls/addnewquestion.html");
                        $sql2 = "SELECT * FROM docs WHERE thumb_img = '$filename';";
                        $result = mysqli_query($conn,$sql2);
                        if($row = mysqli_fetch_assoc($result)){
                            $doc_id = $row['doc_id'];
                        }
                    }
                    else{
                        //uploading thumbnail
                        if(move_uploaded_file($_FILES["thumb"]["tmp_name"], "../Thumbnail/".$filename)){
                            $sql="INSERT INTO docs(doc_id,thumb_img,tag,title,descrip,upload_date,d_type,auther) VALUES($doc_id,'$filename','QUIZ','$title','$desc', CURDATE() ,'q','sdhfl');";
                            mysqli_query($conn,$sql);
                            //get id from table
                            $sql2 = "SELECT * FROM docs WHERE thumb_img = '$filename';";
                            $result = mysqli_query($conn,$sql2);
                            if($row = mysqli_fetch_assoc($result)){
                                $doc_id = $row['doc_id'];
                            }
                        }else{
                            echo "File is not uploaded";
                        }
                    }
                } else{
                    echo "Error: There was a problem uploading your file. Please try again."; 
                }
            }
            else{
                echo "Error: " . $_FILES["thumb"]["error"];
            }
        }

?>

<body>
    <h1 class="header">Add Questions</h1>

    <div class="input-values" id="Fields">

        <form action="./Htmls/FinishWork.php?id=<?php echo $doc_id ?>" method="post">
            <div class="form-add" id="ques-form">
                <div class="title-desc">
                    <textarea class="inc-d" onkeyup="textAreaAdjust(this)" name="description" id="description" required placeholder="description view on quiz page "></textarea>
                    <input class="inc-d" type="text" name="topic" id="topic" required placeholder="topic">
                </div>
                <div class="question-add-tile">
                    <div class="inputs">
                        <textarea onkeyup="textAreaAdjust(this)" name="question[]" id="question" required placeholder="Question"></textarea>
                        <input type="text" name="option1[]" id="option1" required placeholder="First Option">
                        <input type="text" name="option2[]" id="option2" required placeholder="Second Option">
                        <input type="text" name="option3[]" id="option3" required placeholder="Third Option">
                        <input type="text" name="option4[]" id="option4" required placeholder="Fourth Option">
                        <input type="number" name="correct[]" id="correctop" min=1 max=4 required
                            placeholder="correct option">
                    </div>
                    <div class="remove-b">
                        <button class="remove">remove</button>
                    </div>
                </div>
                <script>
                    function textAreaAdjust(element) {
                        element.style.height = "1px";
                        element.style.height = (0 + element.scrollHeight) + "px";
                    }
                </script>
            </div>
            <div class="add-finish-buttons">
                <button class="add-more b-style">add question</button>
                <input type="submit" class="b-style submit" value="Finish">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".add-more").click(function (e) {
                e.preventDefault();
                $("#ques-form").append(`
                <div class="question-add-tile">
                    <div class="inputs">
                        <textarea onkeyup="textAreaAdjust(this)" name="question[]" id="question" required placeholder="Question"></textarea>
                        <input type="text" name="option1[]" id="option1" required placeholder="First Option">
                        <input type="text" name="option2[]" id="option2" required placeholder="Second Option">
                        <input type="text" name="option3[]" id="option3" required placeholder="Third Option">
                        <input type="text" name="option4[]" id="option4" required placeholder="Fourth Option">
                        <input type="number" name="correct[]" id="correctop" min=1 max=4 required
                            placeholder="correct option">
                    </div>
                    <div class="remove-b">
                        <button class="remove">remove</button>
                    </div>
                </div>
                        `);
            })
            $(document).on('click', '.remove', function (e) {
                e.preventDefault();
                let ques_tile = $(this).parent().parent();
                $(ques_tile).remove();
            })
        })
    </script>
</body>

</html>