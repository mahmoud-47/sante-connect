const menu_button = document.getElementById("menu-button");
const navbar = document.getElementById("navbar");
const menu_img = document.getElementById("menu-img");
const main = document.getElementById("main");
const logo_image = document.getElementById("logo_image");
const likes = document.querySelectorAll(".like-medecin");

document.onclick = function(e) {
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

likes.forEach((like,index) => {
    like.addEventListener("click",()=>{
        like.classList.toggle("liked");
        like.classList.contains("liked") ? like.setAttribute("src","../Icons/like_filled.png") : like.setAttribute("src","../Icons/like.png"); 

    });
});