var boutton=document.getElementById("image3");
var password=document.getElementById("pwd");
boutton.addEventListener("click",()=>{
    console.log("clicked");
    if (password.type==="password"){
        password.type="text";
        boutton.setAttribute("src","../Icons/show.png");
    }
    else{
        password.type="password";
        boutton.setAttribute("src","../Icons/hide.png");
    }
})
