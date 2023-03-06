if(window.innerWidth<=500){
    document.getElementById("comman-heading-part").innerHTML = `
    <div class="header-mob">
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
</div>
    `;

    document.getElementById("menu-button").onclick = ()=>{
        if(document.getElementById("draw").offsetWidth == 0){
            document.getElementById("blur-part-mob").style.display = 'block';
            document.getElementById("draw").classList.remove("sidedrawclose");
            document.body.classList.add("not-scrollable");
            document.getElementById("draw").classList.add("sidedrawopen");
            document.getElementById("blur-part-mob").style.width = (document.body.offsetWidth - document.getElementById("draw").offsetWidth -5) + 'px';
        }else{
            document.getElementById("blur-part-mob").style.display = 'none';
            document.getElementById("draw").classList.add("sidedrawclose");
            document.getElementById("draw").classList.remove("sidedrawopen");
            document.body.classList.remove("not-scrollable");
            //collaps
            var exp = document.getElementsByClassName("subch-m-mob");
                
            for(let i=0;i<exp.length;i++){
                if(exp[i].style.display=='block'){
                var items = exp[i].childNodes;
                    for (let i = 0; (i*2+1) < items.length; ++i) {
                        if(items[i*2+1].className == "subch-ele-m-mob fadein"){
                            items[i*2+1].classList.remove('fadein');
                        }
                    }
                    exp[i].style.display = 'none';
                }
            }
            var expics = document.getElementsByClassName("expic");
            for(let i=0;i<expics.length;i++){
                if(expics[i].className=='fa fa-caret-down expic'){
                    expics[i].className = 'fa fa-caret-right expic';
                }
            }
        }
    }
    function fadeIn (item, delay) {
        setTimeout(() => {
            item.classList.add('fadein')
        }, delay)
    }
    function fadeIno(item,delay){
        setTimeout(()=> {
            item.classList.remove('fadein');
        },delay)
    }
    function expend(ele){
        if(ele.childNodes[3].className == "fa fa-caret-right expic"){
            ele.childNodes[3].className = "fa fa-caret-down expic";
            ele.parentElement.childNodes[3].style.display='block';
            var items = ele.parentElement.childNodes[3].childNodes
            for (let i = 0; (i*2+1) < items.length; ++i) {
                fadeIn(items[i*2+1], i * 70)
            }
        }
        else{
            ele.childNodes[3].className = "fa fa-caret-right expic";
            var items = ele.parentElement.childNodes[3].childNodes
            for (let i = 0; (i*2+1) < items.length; ++i) {
                items[i*2+1].classList.remove('fadein')
            }
            ele.parentElement.childNodes[3].style.display='none';
        }
    }
}

// document.getElementById("this").parentElement.childNodes