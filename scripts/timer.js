var time_element = document.getElementById("time-disp");
var timelimit = 60;
var val = timelimit;
function call_timer(){
   var timer = window.setInterval(function (){
    if(time_element!=null){
        time_element.classList.add("time");
        if(val==0){
            document.getElementById("time-up").classList.add("time-up");
            clearInterval(timer);
            showNextQuestionButton();
            disable_onclick();
            remove_hover();
            document.getElementById("op"+correct_op).classList.add("currect-option");
        }
        if(val==10){
            time_element.classList.add("time-c");
        }
        var timeString = val.toString();
        
        if(timeString.length==1){
            time_element.innerHTML = "0"+timeString;
        }else{
            time_element.innerHTML = timeString;
        }
    }
    else{
        clearInterval(timer);
    }
    val=val-1;
   },1000);
}
function restart_timer(){
    time_element = document.getElementById("time-disp");

    document.getElementById("time-up").classList.remove("time-up");
    time_element.classList.remove("time-c");
    if(val!=-1){
        val = timelimit;
    }
    else{
        val = timelimit;
        var timer = window.setInterval(function (){
            if(time_element!=null){
                time_element.classList.add("time");
                if(val==0){
                    document.getElementById("time-up").classList.add("time-up");
                    clearInterval(timer);
                    showNextQuestionButton();
                    disable_onclick();
                    remove_hover();
                    document.getElementById("op"+correct_op).classList.add("currect-option");
                }
                if(val==10){
                    time_element.classList.add("time-c");
                }
                var timeString = val.toString();
                
                if(timeString.length==1){
                    time_element.innerHTML = "0"+timeString;
                }else{
                    time_element.innerHTML = timeString;
                }
            }
            else{
                clearInterval(timer);
            }
            val=val-1;
           },1000);
    }
}
function stop_timer(){
    document.getElementById("time-disp").innerHTML = val;
    time_element = null;
    val = 0;
}
