var pwd_button = document.getElementById("status");
var password = document.getElementById("password");
pwd_button.addEventListener("click",()=>{
    console.log('clicked');
    if (password.type === "password") {
        password.type = "text";
        pwd_button.setAttribute("src","../Icons/show.png");
    }
    else{
        password.type = "password";
        pwd_button.setAttribute("src","../Icons/hide.png");
    }
})

var pwd_button1 = document.getElementById("status1");
var password1 = document.getElementById("password1");
pwd_button1.addEventListener("click",()=>{
    console.log('clicked');
    if (password1.type === "password") {
        password1.type = "text";
        pwd_button1.setAttribute("src","../Icons/show.png");
    }
    else{
        password1.type = "password";
        pwd_button1.setAttribute("src","../Icons/hide.png");
    }
})