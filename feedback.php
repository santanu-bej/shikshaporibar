<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Styles/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Feedback</title>
</head>
<body>
<div class="header">Give feedback</div>
    <div class="contact-auther">
        <div class="message-box">
            <form action="./feedback.php" method="post">
            <div class="hed">feedback</div>
            <div class="name">
                <input type="text" name="name" id="name" class="inputs" placeholder="Name" required>
            </div>
            <div class="rating">
                <div class="rate">rating</div>
                <input type="radio" name="rate" id="1">1
                <input type="radio" name="rate" id="2">2
                <input type="radio" name="rate" id="3">3
                <input type="radio" name="rate" id="4">4
                <input type="radio" name="rate" id="5">5
            </div>
            <div class="message">
                <textarea onkeyup="textAreaAdjust(this)" name="message" id="message" class="inputs"
                    placeholder="Your Feedback" required></textarea>
                <script>
                function textAreaAdjust(element) {
                    element.style.height = "1px";
                    element.style.height = (0 + element.scrollHeight) + "px";
                }
                </script>
            </div>
            </form>
        </div>
        <div class="telegram">
            <div class="hed">join telegram</div>
            <div class="tele-link"><i>join our </i><span class="link"
                    onclick="location.href = 'https:\\\\facebook.com'">telegram<i class="fa fa-telegram"></i></span><i>
                    group..</i></div>
        </div>
    </div>
</body>
</html>