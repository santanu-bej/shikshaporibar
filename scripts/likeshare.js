var doc_id_q = new URL(window.location.href).searchParams.get("Quiz");
var doc_id_s = new URL(window.location.href).searchParams.get("Sugg");
var doc_id;
if(doc_id_q!=null){
    doc_id = doc_id_q;
}
else if(doc_id_s!=null){
    doc_id = doc_id_s;
}
var isLiked = localStorage.getItem(encodeURIComponent("isLiked"+doc_id));
if(isLiked){
    document.getElementById("like").childNodes[1].className = "fa fa-heart"; 
    document.getElementById("like").onclick = ()=>{}
}else{
    document.getElementById("like").onclick = ()=>{
        //send add like request to the server
        const xhr = new XMLHttpRequest()
        xhr.open('POST','scripts/addlike.php',true)
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
        xhr.onload = ()=>{
            document.getElementById("like").childNodes[1].className = "fa fa-heart";
            //save on localstorage that the user liked
            localStorage.setItem(encodeURIComponent("isLiked"+doc_id),"true");
        }
        xhr.send('id='+doc_id+'&like=true')
    }
}
// document.getElementById("share").onclick = ()=>{
//     var url = window.location.href;
//     location.href = 'whatsapp://send?text='+url
// }
const shareBtn = document.getElementById("share");
const shareOptions = document.querySelector('.share-options');
shareBtn.addEventListener('click', () => {
    shareOptions.classList.toggle('active');
})