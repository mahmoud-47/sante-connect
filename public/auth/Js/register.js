var pwd_button = document.getElementById("status");
var password = document.getElementById("password");
pwd_button.addEventListener("click",()=>{
    console.log('clicked');
    if (password.type === "password") {
        password.type = "text";
        pwd_button.setAttribute("src","../../../Icons/show.png");
    }
    else{
        password.type = "password";
        pwd_button.setAttribute("src","../../../Icons/hide.png");
    }
})