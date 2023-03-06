
// //globals---------------
// var index=0;
// var correct_op;
// var selected;
// var total_number_of_question = QusD.length;
// var score = 0;
// var total_attempts = 0;

// document.getElementById("ques_no").innerHTML = 1;
// document.getElementById("total_ques").innerHTML = total_number_of_question;

// function loadQusData(index){
//     var QusD_in = QusD[index.toString()];
//     document.getElementById("question").innerHTML = QusD_in.ques;
//     document.getElementById("op1").innerHTML = QusD_in.op1;
//     document.getElementById("op2").innerHTML = QusD_in.op2;
//     document.getElementById("op3").innerHTML = QusD_in.op3;
//     document.getElementById("op4").innerHTML = QusD_in.op4;
//     correct_op = QusD_in.correctop;

//     document.getElementById("ques_no").innerHTML = index+1;
// }
// function start_test(){
//     NextQuestion();
//     call_timer();
//     document.getElementById("start-page").classList.add("onclick-wellcome-page")
//     document.getElementById("acc-test").classList.add("onclick-test-page")
// }
// function re_start_test(){
//     index=0;
//     score=0;
//     total_attempts = 0;
//     NextQuestion();
//     document.getElementById("score").innerHTML = score;
//     document.getElementById("op1").className = "option ops";
//     document.getElementById("op2").className = "option ops";
//     document.getElementById("op3").className = "option ops";
//     document.getElementById("op4").className = "option ops";

//     document.getElementById("next_q_b").innerHTML = "Next Question";
//     document.getElementById("quiz-result").style.display = 'none';
//     document.getElementById("acc-test").style.display = 'block';
// }
// function NextQuestion(){
//     if(index<total_number_of_question){
//         restart_timer()
//         add_hover();
//         re_enable_onclick();
//         if(index>0){
//             if(selected!=null){
//                 document.getElementById("op"+selected).classList.remove("wrong-option");
//             }
//             document.getElementById("op"+correct_op).classList.remove("currect-option");
//         }
//         loadQusData(index);
//         hideNextQuestionButton();
//         // restart_timer();
//         index=index+1;
//         if(index==total_number_of_question){
//             document.getElementById("next_q_b").innerHTML = "Finish Exam";
//         }
//     }
//     else{
//         document.getElementById("total-question-value").innerHTML = total_number_of_question;
//         document.getElementById("attempts-value").innerHTML = total_attempts;
//         document.getElementById("correct-value").innerHTML = score;
//         document.getElementById("wrong-value").innerHTML = total_number_of_question - score;
//         var psv = (score/total_number_of_question*100);
//         document.getElementById("percentage-value").innerHTML = Math.round(psv * 10) / 10;
//         document.getElementById("quiz-result").style.display = 'block';
//         document.getElementById("acc-test").style.display = 'none';
//     }
// }
// //options-------------------------------------------------------
// function option(op){
//     selected = op;
//     showNextQuestionButton();
//     remove_hover();
//     stop_timer();
//     var op1_css_class = document.getElementById("op"+op).classList;
//     var correct_op_css_class = document.getElementById("op"+correct_op).classList;
//     if(op == correct_op){
//         op1_css_class.add("currect-option");
//         score = score + 1;
//         document.getElementById("score").innerHTML = score;
//     }
//     else{
//         correct_op_css_class.add("currect-option");
//         op1_css_class.add("wrong-option");
//     }
//     disable_onclick();
//     total_attempts += 1;
// }

// function disable_onclick(){
//     document.getElementById("op1").style.pointerEvents = 'none';
//     document.getElementById("op2").style.pointerEvents = 'none';
//     document.getElementById("op3").style.pointerEvents = 'none';
//     document.getElementById("op4").style.pointerEvents = 'none';
// }
// function re_enable_onclick(){
//     document.getElementById("op1").style.pointerEvents = 'auto';
//     document.getElementById("op2").style.pointerEvents = 'auto';
//     document.getElementById("op3").style.pointerEvents = 'auto';
//     document.getElementById("op4").style.pointerEvents = 'auto';
// }
// function remove_hover(){
//     var options = document.getElementsByClassName("option");
//     options.op1.classList.remove("ops");
//     options.op2.classList.remove("ops");
//     options.op3.classList.remove("ops");
//     options.op4.classList.remove("ops");
// }
// function add_hover(){
//     var options = document.getElementsByClassName("option");
//     options.op1.classList.add("ops");
//     options.op2.classList.add("ops");
//     options.op3.classList.add("ops");
//     options.op4.classList.add("ops");
// }


// // --------------------------------------------------------------
// function hideNextQuestionButton(){
//     document.querySelector(".next-question-b").style.display = 'none';
// }
// function showNextQuestionButton(){
//     document.querySelector(".next-question-b").style.display = 'block';
// }


//v2


//globals---------------
var index=0;
// var total_number_of_question = QusD.length;
var score = 0;
var total_attempts = 0;

document.getElementById("ques_no").innerHTML = 1;
document.getElementById("total_ques").innerHTML = noq;

function loadQusData(index){
    const xhr = new XMLHttpRequest()
    xhr.open('POST','scripts/quiz_service.php',true)
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.onload = ()=>{
        document.getElementById("ques").innerHTML = xhr.responseText;
        document.getElementById("ques_no").innerHTML = index+1;
    }
    xhr.send('index='+index.toString()+'&table='+t_b+'&vr=false')
}
function start_test(){
    NextQuestion();
    call_timer();
    document.getElementById("start-page").classList.add("onclick-wellcome-page")
    document.getElementById("acc-test").classList.add("onclick-test-page")
}
function re_start_test(){
    index=0;
    score=0;
    total_attempts = 0;
    NextQuestion();
    document.getElementById("score").innerHTML = score;
    document.getElementById("next_q_b").innerHTML = "Next Question";
    document.getElementById("quiz-result").style.display = 'none';
    document.getElementById("acc-test").style.display = 'block';
}
function NextQuestion(){
    if(index<noq){
        restart_timer()
        add_hover();
        re_enable_onclick();
        loadQusData(index);
        hideNextQuestionButton();
        index=index+1;
        if(index==noq){
            document.getElementById("next_q_b").innerHTML = "Finish";
        }
    }
    else{
        document.getElementById("total-question-value").innerHTML = noq;
        document.getElementById("attempts-value").innerHTML = total_attempts;
        document.getElementById("correct-value").innerHTML = score;
        document.getElementById("wrong-value").innerHTML = noq - score;
        var psv = (score/noq*100);
        document.getElementById("percentage-value").innerHTML = Math.round(psv * 10) / 10;
        document.getElementById("quiz-result").style.display = 'block';
        document.getElementById("acc-test").style.display = 'none';
    }
}
//options-------------------------------------------------------
function option(op){
    showNextQuestionButton();
    remove_hover();
    stop_timer();
    const xhr = new XMLHttpRequest()
    xhr.open('POST','scripts/quiz_service.php',true)
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
    xhr.onload = ()=>{
        correct_op = parseInt(xhr.responseText);
        var op1_css_class = document.getElementById("op"+op).classList;
        var correct_op_css_class = document.getElementById("op"+correct_op).classList;
        if(op == correct_op){
            delete correct_op;
            op1_css_class.add("currect-option");
            score = score + 1;
            document.getElementById("score").innerHTML = score;
        }
        else{
            correct_op_css_class.add("currect-option");
            op1_css_class.add("wrong-option");
        }
        disable_onclick();
        total_attempts += 1;
    }
    xhr.send('index='+(index-1).toString()+'&table='+t_b+'&vr=true')
}

function disable_onclick(){
    document.getElementById("op1").style.pointerEvents = 'none';
    document.getElementById("op2").style.pointerEvents = 'none';
    document.getElementById("op3").style.pointerEvents = 'none';
    document.getElementById("op4").style.pointerEvents = 'none';
}
function re_enable_onclick(){
    document.getElementById("op1").style.pointerEvents = 'auto';
    document.getElementById("op2").style.pointerEvents = 'auto';
    document.getElementById("op3").style.pointerEvents = 'auto';
    document.getElementById("op4").style.pointerEvents = 'auto';
}
function remove_hover(){
    var options = document.getElementsByClassName("option");
    options.op1.classList.remove("ops");
    options.op2.classList.remove("ops");
    options.op3.classList.remove("ops");
    options.op4.classList.remove("ops");
}
function add_hover(){
    var options = document.getElementsByClassName("option");
    options.op1.classList.add("ops");
    options.op2.classList.add("ops");
    options.op3.classList.add("ops");
    options.op4.classList.add("ops");
    console.log("hover added.");
}


// --------------------------------------------------------------
function hideNextQuestionButton(){
    document.querySelector(".next-question-b").style.display = 'none';
}
function showNextQuestionButton(){
    document.querySelector(".next-question-b").style.display = 'block';
}