<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Suggestion</title>
    <link rel="stylesheet" href="./AdminStyles/addquiz.css">
</head>
<body>
    <div class="outer-header">
        <div class="header">Add new Suggestion</div>
    </div>
    <div class="form">
        <form action=".\addpdf.php" method="post" enctype="multipart/form-data">
            <div class="form-ele">
                <label for="title" class="title-label">Title</label>
                <textarea name="title" id="title" placeholder = "Try To Use 10 to 12 Words for good looks" required></textarea>
            </div>
            <div class="form-ele">
                <label for="desc" class="desc-label">Add description</label>
                <textarea name="desc" id="desc" placeholder = "Try to Use 20 to 25 Words for good looks" required></textarea>
            </div><br>
            <div class="form-ele thum-input">
                <label for="tag" class="tag-label">Tag (like:JOB NOTIFICATION,NEWS etc.)</label>
                <input type="text" name="tag" id="tag" required placeholder = "tag">
            </div>
            <div class="form-ele thum-input">
                <label for="thumb" class="thumb-label">Select Thumbnail</label>
                <input type="file" name="thumb" id="thumb" onchange = "showImg(this.value,this)" required>
            </div>
            <div class="form-ele">
                <img src="" alt="selected Tumb" id = "selectedimg">
            </div>
            <div class="button">
                <input type="submit" value="Next" class="next-page-button">
            </div>
            <script>
                function showImg(filename,Ele){
                    file_path = URL.createObjectURL(Ele.files[0]);
                    document.getElementById("selectedimg").style.display = 'block';
                    document.getElementById("selectedimg").src = file_path;
                }
            </script>
        </form>
    </div> 
</body>
</html>