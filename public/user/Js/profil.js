const menu_button = document.getElementById("menu-button");
const navbar = document.getElementById("navbar");
const menu_img = document.getElementById("menu-img");
const main = document.getElementById("main");
const logo_image = document.getElementById("logo_image");


document.onclick = function(e) {
    console.log(e);
    if(e.target.id !== "menu-img" && e.target.id !== "navbar" && e.target.id !== "logo_image"){
        navbar.classList.remove("active");    
        main.classList.remove("active");
        menu_img.classList.remove("active");
    }
}

menu_button.addEventListener("click",()=>{
    navbar.classList.add("active");
    main.classList.add("active");
    menu_img.classList.add("active");
})

const profile_image = document.getElementById("profile-pic");
const profile_input = document.getElementById("input-photo");
profile_input.addEventListener("change",()=>{
    profile_image.setAttribute("src",URL.createObjectURL(profile_input.files[0]))
})


var chevron = document.getElementById("change-pwd");
var chevron_image = document.getElementById("chev-img")
var hidable = document.getElementById("hide-form");

chevron.addEventListener("click",()=>{
    hidable.classList.toggle("show");
    hidable.classList.contains("show") ? chevron_image.setAttribute("src","../Icons/chevron-down.png") : chevron_image.setAttribute("src","../Icons/chevron-up.png");
});

var pwd_button1 = document.getElementById("status1");
var password1 = document.getElementById("pwd1");
pwd_button1.addEventListener("click",()=>{
    if (password1.type === "password") {
        password1.type = "text";
        pwd_button1.setAttribute("src","../Icons/show.png");
    }
    else{
        password1.type = "password";
        pwd_button1.setAttribute("src","../Icons/hide.png");
    }
})

var pwd_button2 = document.getElementById("status2");
var password2 = document.getElementById("pwd2");
pwd_button2.addEventListener("click",()=>{
    if (password2.type === "password") {
        password2.type = "text";
        pwd_button2.setAttribute("src","../Icons/show.png");
    }
    else{
        password2.type = "password";
        pwd_button2.setAttribute("src","../Icons/hide.png");
    }
})