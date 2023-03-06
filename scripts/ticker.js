var v = document.getElementById('li');
var v2 = document.getElementById('nnns');
let width = v.clientWidth;
let width2 = v2.clientWidth;
var m = width2;
console.log(m)
var up = true;
window.setInterval(() => {
    if (m + (-width2) < -width) {
        var prev = document.getElementsByClassName("lis")[0];
        var new_prev = prev.cloneNode(true);
        document.getElementById("li").appendChild(new_prev);
        m = m + prev.clientWidth;
        prev.remove();
    }
    if(up){
        m = m - 1;
    }
    v.style.marginLeft = m.toString() + "px";
}, 15);
v.onmouseover = function(){
    up = false;
};
v.onmouseout = function() {
    up = true;
}


