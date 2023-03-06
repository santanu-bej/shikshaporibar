<?php
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        $doc_id;
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $tag = $_POST['tag'];

            if(isset($_FILES["thumb"]) && $_FILES["thumb"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["thumb"]["name"];
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
                        $sql2 = "SELECT * FROM docs WHERE title = '$title' AND thumb_img = '$filename';";
                        $result = mysqli_query($conn,$sql2);
                        if($row = mysqli_fetch_assoc($result)){
                            $doc_id = $row['doc_id'];
                        }
                    }
                    else{
                        //uploading thumbnail
                        if(move_uploaded_file($_FILES["thumb"]["tmp_name"], "../Thumbnail/".$filename)){
                            $tag = strtoupper($tag);
                            $sql="INSERT INTO docs(thumb_img,tag,title,descrip,upload_date,d_type,auther) VALUES('$filename','$tag','$title','$desc', CURDATE() ,'s','sdhfl');";
                            mysqli_query($conn,$sql);
                            //get id from table
                            $sql2 = "SELECT * FROM docs WHERE title = '$title' AND thumb_img = '$filename';";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add suggestion</title>
    <link rel="stylesheet" href="./AdminStyles/addquestions.css">
    <!-- <script
        type="text/javascript"
        src='https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js'
        referrerpolicy="origin">
    </script> -->
    <script src="https://cdn.tiny.cloud/1/nvy4lrlk8lwne57q3a9x5ud7m71rlhc6f6mjwne7qbf4xedy/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
        tinymce.init({
        selector: '#textarea',  // change this value according to your HTML
        menu: {
            file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
            edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
            view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments' },
            insert: { title: 'Insert', items: 'image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime' },
            format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
            tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | a11ycheck code wordcount' },
            table: { title: 'Table', items: 'inserttable | cell row column | advtablesort | tableprops deletetable' },
            help: { title: 'Help', items: 'help' },
            favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        height: 600,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menubar: 'favs file edit view insert format tools table help',
        content_css: 'css/content.css'
        
        });
    </script>
</head>
<body>
<div class="outer-header">
        <div class="header">Upload pdf</div>
</div>
    <form action="./Htmls/FinishWork2.php?id=<?php echo $doc_id ?>" method="post" enctype="multipart/form-data">
            <div class="form-add" id="ques-form">
                <div class="title-desc">
                    <!-- <textarea class="inc-d" onkeyup="textAreaAdjust(this)" name="description" id="description" required placeholder="description view on suggestion download page page "></textarea> -->
                    <textarea name="description" id="textarea"></textarea>
                    <label for="pdf" class="file_upload_label">select pdf file</label>
                    <input type="file" name="file" id="pdf">
                </div>
                <!-- <script>
                    function textAreaAdjust(element) {
                        element.style.height = "1px";
                        element.style.height = (20 + element.scrollHeight) + "px";
                    }
                </script> -->
            </div>
            <div class="add-finish-buttons">
                <input type="submit" class="b-style submit" value="Finish">
            </div>
        </form>
</body>
</html>