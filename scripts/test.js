function start_test(){
    document.getElementById("start-page").classList.add("onclick-wellcome-page")
    document.getElementById("acc-test").classList.add("onclick-test-page")
    call_timer()
}
function hideNextQuestionButton(){
    document.querySelector(".next-question-b").style.display = 'none';
}
function showNextQuestionButton(){
    document.querySelector(".next-question-b").style.display = 'block';
}