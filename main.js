function Auth() {
    let login = document.getElementById('login');
    let pass = document.getElementById('pass');
    let l = false, p = false;
    for(let i = 0; i < user['auth']['login'].length; i++) {
        if(atob(user['auth']['login'][i]) == login.value) l = true;
    }
    if(l){
        for(let i = 0; i < user['auth']['pass'].length; i++){
            if(atob(user['auth']['pass'][i]) == pass.value) p = true;
        }
    }

    if(!p) alert("Ты где-то ошибься!");
    else {
        document.cookie = "key=" + pass.value;
        document.location.href = './index.php';
    }
}

function CheckAuth() {
    if (get_cookie('key') == null) {
        document.cookie = 'key=0';
    }
    if (get_cookie('key') === '0') {
        document.location.href = './auth.html';
    }
}

function ScreenDetect() {
    if(document.body.offsetWidth < 1025) document.location.href = "./phone.html";
}

function Update(){
    //CheckAuth();
    //ScreenDetect();
    //UpdDesign();
    //ticker2();
    //ticker1();
    //ticker3();

}



function UpdDesign () {
    let ans = get_cookie("tasks");
    let blocks = document.getElementsByClassName("task");
    for(let i = 0; i < blocks.length; i++){
        if(ans[i] === '1'){
            blocks[i].style.backgroundColor = "lightgreen";
        }
    }
    document.getElementById("money").textContent = get_cookie("money");
}


function MMM() {
    document.getElementById("money").textContent = get_cookie("money");
}

function WrongBack() {
    document.location.href = get_cookie('back');

}

function Back(){
    document.location.href = "./index.php";

}



function Teleport(num) {
    let url = "./task" + num + ".html";
    document.cookie = "back=./task" + num + ".html";
    window.open(url);

}

function get_cookie ( cookie_name )
{
    let results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );

    if ( results )
        return ( unescape ( results[2] ) );
    else
        return null;
}

function Market(num) {
    document.getElementById("acception" + num).style.display = "block";
}

function MarketClose(num) {
    document.getElementById("acception").style.display = "none";
}

let clicks = 0;
let colors = [ "cornflowerblue", "gray", "antiquewhite", "aquamarine", "darkblue", "bisque", "white", "#0060b8", "#246ffc", "#fa2828", "#ff4248"];



function Clicker(){
    //ScreenDetect();
    let click = document.getElementById("click");
    let maxW = document.getElementById("space").offsetWidth - 200;
    let maxH = document.getElementById("space").offsetHeight - 200;
    click.style.backgroundColor = colors[Math.round(Math.random() * 11)];
    click.style.left = Math.random() * maxW + "px";
    click.style.top = Math.random() * maxH + "px";
    clicks++;
    document.getElementById("schet").textContent = clicks;
    document.cookie = "xkty=" + clicks;
}

function ClickCentrier() {
    //Update();

    let cl = document.getElementById("click");
    let pole = document.getElementById("space");
    cl.style.left = pole.offsetWidth / 2 - 100 + "px";

    document.getElementById("money").textContent = get_cookie("money");
}


function task9() {
    if(document.getElementById('answerLog').value === 'admin' && document.getElementById('answerPass').value === 'admin' ) {
        document.location.href = './sendTask9.html';
    }
    else alert("Вход не выполнен");
}


function ticker1() {
    let time = get_cookie('code1');
    if(time > 0){
        let sec = time ;
        let h = sec/3600 ^ 0 ;
        let m = (sec-h*3600)/60 ^ 0 ;
        let s = sec-h*3600-m*60 ;
        document.getElementById('timer1').textContent = (h<10?"0"+h:h)+":"+(m<10?"0"+m:m);
        document.getElementById('bar1').style.width = time / 10800 * 100 + '%';
    }


}

function ticker2() {
    let time = get_cookie('code2');
    if (time > 0) {
        let sec = time;
        let h = sec / 3600 ^ 0;
        let m = (sec - h * 3600) / 60 ^ 0;
        let s = sec - h * 3600 - m * 60;
        document.getElementById('timer2').textContent = (h < 10 ? "0" + h : h) + ":" + (m < 10 ? "0" + m : m);
        document.getElementById('bar2').style.width = time / 10800 * 100 + '%';


    }
}

    function ticker3() {
        let time = get_cookie('code3');
        if (time > 0) {
            let sec = time;
            let h = sec / 3600 ^ 0;
            let m = (sec - h * 3600) / 60 ^ 0;
            let s = sec - h * 3600 - m * 60;
            document.getElementById('timer3').textContent = (h < 10 ? "0" + h : h) + ":" + (m < 10 ? "0" + m : m);
            document.getElementById('bar3').style.width = time / 10800 * 100 + '%';
        }
}


