<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="./Styles/index2.css">
    <link rel="stylesheet" href="./Styles/ListItemStyle.css">
    <link rel="stylesheet" href="./Styles/indexingStyle.css">
    <link rel="stylesheet" href="./Styles/high.css">
    <link rel="stylesheet" href="./Styles/sideref.css">
    <link rel="stylesheet" href="./Styles/footer.css">
    <link rel="stylesheet" href="./Styles/foot.css">
    <link rel="stylesheet" href="./Styles/headermob.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Atma&display=swap" rel="stylesheet">
</head>


<!-- <div class="header">
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
                    <option value="./?filter=CURRENT AFFAIRS">current affairs</option>>
                    <option value="./contact.php">Contact Us</option>
                </select>
            </div>
        </div> -->

<body style="color: black;">
    <header id="comman-heading-part">
        <!-- <div class="header-mob">
            <div class="h-mob-ele" id="menu-button">
                <div class="baric"></div>
                <div class="baric"></div>
                <div class="baric"></div>
            </div>
            <div class="h-mob-ele">
                <div class="title-h-mob">
                    শিক্ষা পরিবার
                </div>
            </div>
            <div class="h-mob-ele">
                <img src="./logo/logo3.png" alt="logo" class="logo-mob">
            </div>
        </div>
        <div class="side-drawer-mob" id="draw">
            <div class="menu-side-mob">
                <div class="menu-text">Menu</div>
                <div class="line-m-mob"></div>
            </div>
            <a href="./" class="home-mob-a">
                <div class="home-mob">
                    Home
                </div>
            </a>
            <a href="./?filter=q" class="home-mob-a">
                <div class="home-mob">
                    Quiz
                </div>
            </a>
            <div class="home-mob-a">
                <div class="home-mob home-mob-expend" onclick="expend(this)">
                    <div>Suggestion</div>
                    <i class="fa fa-caret-right expic"></i>
                </div>
                <div class="subch-m-mob">
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=s'">
                        All
                    </div>
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=MADHYAMIK SUGGESTION'">
                        Madhyamik Suggestions
                    </div>
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=MADHYAMIK NOTES'">
                        Madhyamik Notes
                    </div>
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=HS SUGGESTION'">
                        HS Suggestions 
                    </div>
                </div>
            </div>
            <div class="home-mob-a">
                <div class="home-mob home-mob-expend" onclick="expend(this)">
                    <div>Others</div>
                    <i class="fa fa-caret-right expic"></i>
                </div>
                <div class="subch-m-mob">
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=JOB NOTIFICATION'">
                        Job notification
                    </div>
                    <div class="subch-ele-m-mob" onclick="location.href = './?filter=CURRENT AFFAIRS'">
                        Current Affairs
                    </div>
                </div>
            </div>
        </div>
        <div id="blur-part-mob">
        </div> -->
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
                    <option value="./?filter=CURRENT AFFAIRS">current affairs</option>>
                    <option value="./contact.php">Contact Us</option>
                </select>
            </div>
        </div>
    </header>
    <script src="./scripts/sidedrawmob.js"></script>
    <div class="highlights">
        <div class="highlights-h">
            BREAKING
        </div>
        <div class="highlights-ele" id="nnns">
            <div class="hmove news-ticker-display" id = "upli">
                <ul id="li">
                    <?php
                        define('DOCROOT', realpath(dirname(__FILE__)).'/');
                        echo DOCROOT;
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

                        if(!$conn){
                            die("Failed to connect ". mysqli_connect_error());
                        }
                        else{
                            $result = mysqli_query($conn,$sqlh);
                            $num_of_row = mysqli_num_rows($result);
            
                            $dir = "./Thumbnail/";
                                    
                            if($num_of_row>0){
                                while($row = mysqli_fetch_assoc($result)){
                                    echo getTile3($dir.$row["thumb_img"],$row["title"],$row['doc_id'],$row['d_type'],$row['tag']);
                                }
                            }
                        }
                    ?>
                </ul>
            </div>
        </div>
        <script src="./scripts/ticker.js"></script>
    </div>

    <div class="main-content" id="main-content">
        <div class="main-content-doc">
            <div class="list-of-doc-items">
                <?php
                    $doc_to_pass;
                    $conn = mysqli_connect("localhost:3306","root","123456789","skpdb");
                    if(!$conn){
                        die("Failed to connect ". mysqli_connect_error());
                    }
                    else{
                        function getDocTile($img,$title,$upldate,$tag,$desc , $type, $doc_id){
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
                            return '
                            <div class="doc-item">
                                <div class="thumbline">
                                    <a href="'.$page.'?'.$pasV.'='.$doc_id.'" >
                                        <img src='.$img.' alt="thumbline" class="thumbImg">
                                    </a>
                                </div>
                                <div class="doc-title-desc">
                                    <div class="tag_and_date desc-item">
                                        <div class="tag" onclick="location.href =\'./?filter='.$tag.'\'">'.$tag.'</div>
                                        <div class="upload-date desc-item">'.$upldate.'</div>
                                    </div>
        
                                    <div class="title desc-item">
                                        <a href="'.$page.'?'.$pasV.'='.$doc_id.'" class="title-l">'.$title.'</a>
                                    </div>
                                    <div class="description desc-item">'.$desc.'</div>
                                </div>
                            </div>
                            ';

                        }
                        $sql = "SELECT * FROM docs;";
                        $num_of_row;
                        if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['filter'])){
                            $f =  $_GET['filter'];
                            $sql = "SELECT * FROM docs WHERE d_type = '$f' OR tag = '$f';";
                            $result = mysqli_query($conn,$sql);
                            $num_of_row = mysqli_num_rows($result);
                        }
                        else{
                            $sql = "SELECT * FROM docs;";
                            $result = mysqli_query($conn,$sql);
                            $num_of_row = mysqli_num_rows($result);
                        }
                        $limit = 5;
                        $total_number_of_page = ceil($num_of_row/$limit);
                        $doc_from;
                        $p;
                        if(isset($_GET['pf'])){
                            // d = 0 -> 1 to 6
                            // d = 1 -> 7 to 13
                            $p = ((int)$_GET['pf']-1);
                        }
                        else{
                            $p=0;
                        }
                        $sql = "SELECT * FROM docs;";
                        if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['filter'])){
                            $f =  $_GET['filter'];
                            $offset = $p*$limit;
                            $sql = "SELECT * FROM docs WHERE d_type = '$f' OR tag = '$f' ORDER BY (views+(upload_date/3000)+sug_p)/3 DESC LIMIT $offset,$limit;";
                        }
                        else{
                            $offset = $p*$limit;
                            $sql = "SELECT * FROM docs ORDER BY (views+(upload_date/3000)+sug_p)/3 DESC LIMIT $offset,$limit;";
                        }

                        $result = mysqli_query($conn,$sql);
                        $num_of_row = mysqli_num_rows($result);

                        $dir = "./Thumbnail/";
                        
                        if($num_of_row>0){
                            while($row = mysqli_fetch_assoc($result)){
                                echo getDocTile($dir.$row["thumb_img"],$row["title"],$row["upload_date"],$row["tag"],$row["descrip"],$row['d_type'],$row['doc_id']);
                            }
                        }

                    }
                    $conn -> close();
                ?>

            </div>
            <div class="page-indexing doc-item">
                <div class="indexes">
                        <?php
                            if($p>0){
                                echo '<div class="page1 page" onclick="prev()" id="p">< prev</div>';
                            }
                        ?>
                        <div class="page_details page">page <?php echo $p+1 ?> out of <?php echo $total_number_of_page ?></div>
                        <?php
                            if(($p+1)<$total_number_of_page){
                                echo '<div class="page1 page" onclick="next()" id="p">next></div>';
                            }
                        ?>
                </div>
                <script>
                    function next(){
                        <?php
                            if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['filter'])){
                                $f =  $_GET['filter'];
                                $pf = $p+2;
                                $page = "index.php?pf=$pf&filter=$f";
                            }
                            else{
                                $pf = $p+2;
                                $page = "index.php?pf=$pf";
                            }
                        ?>
                        var page = "<?php echo $page ?>";
                        location.href = page;
                    }
                    function prev(){
                        <?php
                            if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['filter'])){
                                $f =  $_GET['filter'];
                                $page = "index.php?pf=$p&filter=$f";
                            }
                            else{
                                $page = "index.php?pf=$p";
                            }
                        ?>
                        var page = "<?php echo $page ?>";
                        location.href = page;                    
                    }
                </script>
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