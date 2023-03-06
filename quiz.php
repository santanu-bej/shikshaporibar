<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MainPage</title>
    <link rel="stylesheet" href="./Styles/index2.css">
    <link rel="stylesheet" href="./Styles/Quiz.css">
    <link rel="stylesheet" href="./Styles/test.css">
    <link rel="stylesheet" href="./Styles/timer.css">
    <link rel="stylesheet" href="./Styles/Quiz_result.css">
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
                <div class="flex-items dropdown" id="dp">
                    <div class="menu-op">others <i class="fa fa-caret-down" id="ick"></i></div>
                    <div class="dropdown-menu">
                        <a href="./?filter=JOB NOTIFICATION">Job notification</a>
                        <a href="./?filter=CURRENT AFFAIRS">current affairs</a>
                    </div>
                </div>
                <script>
                var ele = document.getElementById("dp");
                ele.onmouseover = function() {
                    document.getElementById("ick").className = "fa fa-caret-right";
                }
                ele.onmouseout = function() {
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
        $table_name;
        if(!$conn){
            die("Failed to connect ". mysqli_connect_error());
        }
        else{
            $doc_id = $_GET['Quiz'];
            $sql = "SELECT * FROM docs WHERE doc_id = ".$doc_id.";";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            $sqlup = "UPDATE docs SET views=views+1 WHERE doc_id = ".$doc_id.";";
            // echo $sqlup;
            $result = mysqli_query($conn,$sqlup);

            $dir = "./Thumbnail/";

            // doc variables 
            $thumb = $dir.$row["thumb_img"];
            $title = $row["title"];  
            $update = $row["upload_date"];
            $author = $row['auther'];
            $quiz_up_desc = 'by '.$author.' on '.$update;
            $sql = "SELECT * FROM quizes WHERE q_id = ".$doc_id.";";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $table_name = $row['t_name'];
            //doc variables 
            $quizdescription = $row['descrip'];
            $topic = $row['topic'];

            $sql = "SELECT * FROM ".$table_name.";";
            $result = mysqli_query($conn,$sql);
            $number_of_questions = mysqli_num_rows($result);
            $QusD = array();
            while($row = mysqli_fetch_assoc($result)){
                $qs = [
                    "ques"=>$row["ques"],
                    "op1"=>$row["op1"],
                    "op2"=>$row["op2"],
                    "op3"=>$row["op3"],
                    "op4"=>$row["op4"],
                    "correctop"=>$row["correctop"]
                ];
                array_push($QusD,$qs);
            }
        }
        $conn -> close();
    ?>
    <div class="main-content">
        <div class="main-content-doc">
            <div class="quiz-page">
                <div class="quiz-title"><?php echo $title; ?></div>
                <hr>
                <div class="quiz-upload-desc"><?php echo $quiz_up_desc; ?></div>
                <hr>
                <div class="quiz-name-image-description-and-quiz">
                    <div class="quiz-name"><?php echo $title; ?></div>
                    <div class="quiz-image">
                        <img src="<?php echo $thumb ?>" alt="thumblines" srcset="" class="thumb">
                    </div>
                    <div class="quiz-description"><?php echo $quizdescription ?></div>
                    <div class="quiz-details">
                        <table class="quiz-details-table">
                            <tbody>
                                <tr class="description-of-quiz">
                                    <th class="heading" colspan="2">QUIZ DETAILS</th>
                                </tr>
                                <tr class="subject table-row">
                                    <td class="sub-att table-text">বিষয়</td>
                                    <td class="sub-val table-text"><?php echo $topic ?></td>
                                </tr>
                                <tr class="no-of-questions table-row">
                                    <td class="qno-att table-text">প্রশ্ন সংখ্যা</td>
                                    <td class="qno-val table-text" id='NOQ'>৪৫</td>
                                </tr>
                                <tr class="tiem table-row">
                                    <td class="time-att table-text">সময়</td>
                                    <td class="time-val table-text">৬০ সেকেন্ড/প্রশ্ন</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="quiz">
                        <div class="start-quiz-page" id="start-page">
                            <div class="wellcome-quiz-text">কুইজটিতে অংশ নিতে নীচের লেখায় ক্লিক করো</div>
                            <input class="start-quiz-button" type="button" value="Start Test" onclick="start_test()">
                        </div>
                        <div class="test-page" id="acc-test">
                            <div class="timer-score">
                                <div class="timer">
                                    <div class="time-i t" id="time-disp">00</div>
                                    <div class="time-up-i t" id="time-up">Time Up!</div>
                                    <script src="./scripts/timer.js"></script>
                                </div>
                                <div class="number-of-questions"><span id="ques_no"></span>/<span
                                        id="total_ques"></span></div>
                                <div class="score">
                                    <span class="score-lebal">score:</span>
                                    <span class="score-value" Id="score">0</span>
                                </div>
                            </div>
                            <div id="ques">
                                <div class="questin-number-of-questions">
                                    <div class="question" id="question">
                                        Undefined
                                    </div>
                                </div>
                                <div class="options">
                                    <div class="option" id="op1" onclick="option(1)">/</div>
                                    <div class="option" id="op2" onclick="option(2)">/</div>
                                    <div class="option" id="op3" onclick="option(3)">/</div>
                                    <div class="option" id="op4" onclick="option(4)">/</div>
                                </div>
                            </div>
                            <div class="next-question-button">
                                <div class="next-question-b" onclick="NextQuestion()" id="next_q_b">
                                    Next Question
                                </div>
                            </div>
                        </div>
                        <div class="quiz-result" id="quiz-result">
                            <div class="quiz-result-title">Quiz Result</div>
                            <div class="quiz-result-elements"><span class="properties">Total Questions: </span><span
                                    class="values" id="total-question-value">6</span></div>
                            <div class="quiz-result-elements"><span class="properties">Attempts: </span><span
                                    class="values" id="attempts-value">6</span></div>
                            <div class="quiz-result-elements"><span class="properties">Correct: </span><span
                                    class="values" id="correct-value">5</span></div>
                            <div class="quiz-result-elements"><span class="properties">Wrong: </span><span
                                    class="values" id="wrong-value">2</span></div>
                            <div class="quiz-result-elements bottam-ele"><span class="properties">Percentage:
                                </span><span class="values" id="percentage-value">50%</span></div>
                            <div class="try-again-buttonj-space">
                                <div class="try-again-button" onclick="re_start_test()">Try Again</div>
                            </div>
                        </div>
                        <script src="./scripts/eng_num_to_beng.js"></script>
                        <script>
                            var noq = <?php echo $number_of_questions?>;
                            t_b = '<?php echo $table_name?>';
                            document.getElementById("NOQ").innerHTML = getDigitBanglaFromEnglish(noq.toString());
                        </script>
                        <script src="./scripts/test_work.js"></script>
                    </div>
                    <div class="container">
                        <button class="share-btn">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <div class="share-options">
                            <p class="title">share</p>
                            <div class="social-media">
                                <button class="social-media-btn"><i class="far fa-folder-open"></i></button>
                                <button class="social-media-btn"><i class="fab fa-whatsapp"></i></button>
                                <button class="social-media-btn"><i class="fab fa-instagram"></i></button>
                                <button class="social-media-btn"><i class="fab fa-twitter"></i></button>
                                <button class="social-media-btn"><i class="fab fa-facebook-f"></i></button>
                                <button class="social-media-btn"><i class="fab fa-linkedin-in"></i></button>
                            </div>
                            <div class="link-container">
                                <p class="link">https://example.com/share</p>
                                <button class="copy-btn">copy</button>
                            </div>
                        </div>
                    </div>
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