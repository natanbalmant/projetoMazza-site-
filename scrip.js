function rolar(){
    var obj=event.target;
    document.getElementById(obj).scrollIntoView();
}

function inicia(){
    document.getElementById("t1").addEventListener("click", rolar);
    document.getElementById("t2").addEventListener("click", rolar);
    document.getElementById("t3").addEventListener("click", rolar);
    document.getElementById("t4").addEventListener("click", rolar);
    document.getElementById("t5").addEventListener("click", rolar);
}
window.addEventListener("load", inicia);
