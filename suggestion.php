<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="./Styles/index2.css">
    <link rel="stylesheet" href="./Styles/Quiz.css">
    <link rel="stylesheet" href="./Styles/Quiz_result.css">
    <link rel="stylesheet" href="./Styles/d_suggestion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./Styles/sideref.css">
    <link rel="stylesheet" href="./Styles/high.css">
    <link rel="stylesheet" href="./Styles/foot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="color: black;">
    <header id="comman-heading-part">
        <div class="header">
            <div class="tital-name flex-item-outer">
                <img src="./logo/logo3.png" alt="logo" class="logo">
            </div>
            <div class="flex-container-menu flex-item-outer">
                <div class="flex-items" onclick="location.href = './'">Home</div>
                <div class="flex-items" onclick="location.href = './?filter=q'">Mock test</div>
                <div class="flex-items" onclick="location.href = './?filter=s'">Suggestion</div>
                <div class="flex-items dropdown" id = "dp">
                    <div class="menu-op">others <i class="fa fa-caret-down" id="ick"></i></div>
                    <div class="dropdown-menu">
                        <a href="./?filter=JOB NOTIFICATION">Job notification</a>
                        <a href="./?filter=CURRENT AFFAIRS">current affairs</a>
                    </div>
                </div>
                <script>
                    var ele = document.getElementById("dp");
                    ele.onmouseover = function (){
                        document.getElementById("ick").className = "fa fa-caret-right";
                    }
                    ele.onmouseout = function (){
                        document.getElementById("ick").className = "fa fa-caret-down";
                    }
                </script>
                <div class="flex-items" onclick="location.href = './contact.php'">Contact Us</div>
            </div>
            <div class="flex-selector">
                <select class='selector'
                    onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="" selected="selected">Menu</option>
                    <option value="./">Home</option>
                    <option value="./?filter=q">Mock test</option>
                    <option value="./?filter=s">Suggestion</option>
                    <option value="./?filter=JOB NOTIFICATION">Job notification</option>
                    <option value="./?filter=CURRENT AFFAIRS">current affairs</option>
                    <option value="./contact.php">Contact Us</option>
                </select>
            </div>
        </div>
    </header>
    <div class="highlights">
        <div class="highlights-h">
            BREAKING
        </div>
        <div class="highlights-ele" id="nnns">
            <div class="hmove news-ticker-display" id="upli">
                <ul id="li">
                    <?php
                    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
                    function getTile3($img , $titlef,$doid,$type,$tag){
                        $page;
                        $pasV;
                        if($type=='q'){
                            $page = 'quiz.php';
                            $pasV = 'Quiz';
                        }
                        if($type=='s'){
                            $page = 'suggestion.php';
                            $pasV = 'Sugg';
                        }
                        $tle = '
                            <li class="lis"><div class="hitem" onclick="location.href=\''.$page.'?'.$pasV.'='.$doid.'\'">
                                <img src="'.$img.'" alt="thumb" class="thmb">
                                <div class="tag-high">'.$tag.'</div>
                                <div class="title-high">'.$titlef.'</div>
                            </div></li>
                            ';
                        return $tle;
                    }
                    $sqlh = "( SELECT * FROM docs ORDER BY upload_date DESC LIMIT 5) UNION ( SELECT * FROM docs ORDER BY views DESC LIMIT 5);";
                    $result = mysqli_query($conn,$sqlh);
                    $num_of_row = mysqli_num_rows($result);
    
                    $dir = "./Thumbnail/";
                            
                    if($num_of_row>0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo getTile3($dir.$row["thumb_img"],$row["title"],$row['doc_id'],$row['d_type'],$row['tag']);
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
        <script src="./scripts/ticker.js"></script>
    </div>
    <?php
        $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $doc_id = $_GET['Sugg'];
            $sql = "SELECT * FROM docs WHERE doc_id = ".$doc_id.";";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $sqlup = "UPDATE docs SET views=views+1 WHERE doc_id = ".$doc_id.";";
            $result = mysqli_query($conn,$sqlup);


            $dir = "./Thumbnail/";

            // doc variables 
            $thumb = $dir.$row["thumb_img"];
            $title = $row["title"];  
            $update = $row["upload_date"];
            $author = $row['auther'];
            $sugges_up_desc = 'by '.$author.' on '.$update;

            $sql = "SELECT * FROM suggestions WHERE s_id = ".$doc_id.";";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            //doc variables
            $filen = $row['pdf_name'];
            $descfile = $row['descrip'];
        }
        $conn -> close(); 
    ?>
    <div class="main-content">
        <div class="main-content-doc">
            <div class="quiz-page">
                <div class="quiz-title"><?php echo $title; ?></div>
                <hr>
                <div class="quiz-upload-desc"><?php echo $sugges_up_desc; ?></div>
                <hr>
                <div class="quiz-name-image-description-and-quiz">
                    <div class="quiz-name"><?php echo $title; ?></div>
                    <div class="quiz-image">
                        <img src="<?php echo $thumb ?>" alt="thumblines" srcset="" class="thumb">
                    </div>
                    <?php
                        #reading the html
                        $fdir = "./SuggDeschtml/".$descfile;
                        $ftr = fopen($fdir,"r");
                        if($ftr){
                            $htmlcontent = fread($ftr,filesize($fdir));
                            fclose($ftr);
                    ?>
                        <div class="quiz-description"><?php echo $htmlcontent ?></div>
                    <?php
                        }
                    ?>
                    <div class="quiz-description">
                        <div class="like-share">
                            <div class="like-share-ele" id="like">
                                <i class="fa fa-heart-o"></i>
                                <!-- <i class="fa fa-heart"></i> -->
                            </div>
                            <div class="like-share-ele" id="share">
                                <i class="fa fa-share"></i>
                            </div>
                        </div>
                    </div>
                    <script src="./scripts/likeshare.js"></script>
                </div>
                <div class="download-s">
                    <div class="quiz-result-title">Download PDF</div>
                    <div class="download-buttons">
                        <!-- <div class="download-button" onclick="location.href = './Suggestions/<?php //echo $filen?>'">View pdf</div> -->
                        <div class="download-button"
                            onclick="window.open('./Suggestions/<?php echo $filen?>', '_blank')">View pdf</div>
                        <div class="download-button"
                            onclick="location.href = './scripts/downloadpdf.php?file=<?php echo $filen ?>';">Download
                            pdf</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-content-ref">
        <div class="main-content-ref-inner">
                    <div class="recents">
                        <div class="rec">
                            <div class="recents-header">RECENT</div>
                        </div>
                        <div class="recents-elements">
                            <?php
                            $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
                            function getTile2($img , $titlef,$upd,$doid,$auther,$type){
                                $page;
                                $pasV;
                                if($type=='q'){
                                    $page = 'quiz.php';
                                    $pasV = 'Quiz';
                                }
                                if($type=='s'){
                                    $page = 'suggestion.php';
                                    $pasV = 'Sugg';
                                }
                                $tle = '
                                <div class="tile">
                                    <img src="'.$img.'" alt="thumbnail" class="img">
                                    <div class="title-date-aother">
                                        <div class="title-sr" onclick="location.href = \''.$page.'?'.$pasV.'='.$doid.'\' ">
                                            '.$titlef.'
                                        </div>
                                        <div class="date-aother">
                                            <div class="date">'.$upd.'</div>
                                            <div class="aother">'.$auther.'</div>
                                        </div>
                                    </div>
                                </div>
                                ';
                                return $tle;
                            }
                            $sqlr = "SELECT * FROM docs ORDER BY upload_date DESC LIMIT 7;";
                            $result = mysqli_query($conn,$sqlr);
                            $num_of_row = mysqli_num_rows($result);
    
                            $dir = "./Thumbnail/";
                            
                            if($num_of_row>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo getTile2($dir.$row["thumb_img"],$row["title"],$row["upload_date"],$row['doc_id'],$row['auther'],$row['d_type']);
                                }
                            }
                        ?>
                        </div>
                    </div>
                    <div class="popular">
                        <div class="rec">
                            <div class="popular-header">POPULAR</div>
                        </div>
                        <div class="popular-elements">
                            <?php
                            $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
                            $sqlr = "SELECT * FROM docs ORDER BY views DESC LIMIT 7;";
                            $result = mysqli_query($conn,$sqlr);
                            $num_of_row = mysqli_num_rows($result);
    
                            $dir = "./Thumbnail/";
                            
                            if($num_of_row>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo getTile2($dir.$row["thumb_img"],$row["title"],$row["upload_date"],$row['doc_id'],$row['auther'],$row['d_type']);
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="col2">
                <h4>QUICK LINKS</h4>
                <div class="quick-links">
                    <a href="">HOME </a>
                    <a href="">SUGGESTION </a>
                    <a href="">JOB NOTIFICATION</a>
                    <a href="">MOCK TEST</a>
                    <a href="">CURRENT AFFAIRS</a>
                    <a href="">JOIN US WITH TELEGRAM</a>
                </div>
            </div>
            <div class="col3">
                <h4>SOME IMPORTANT WEBSITES</h4>
                <div class="foot-contact">
                    <a href="">Phone: &nbsp; &nbsp;+91-9749760947</a>
                    <a href="">Email: &nbsp;&nbsp;anukulmaity18@gmail.com</a>
                </div>
            </div>
            <div class="col1">
                <img class="foot-logo" src="./logo/logo3.png" alt="" onclick="location.href = './'">
                <div class="foot-contact-telegram">
                    join sikhhaporibar telegram chanal<i class="fa fa-telegram"></i>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>