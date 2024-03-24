const menu_button = document.getElementById("menu-button");
const navbar = document.getElementById("navbar");
const menu_img = document.getElementById("menu-img");
const main = document.getElementById("main");
const logo_image = document.getElementById("logo_image");


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

var chevrons = document.querySelectorAll(".chevrons");
var hidable = document.querySelectorAll(".show-hide-rv");
chevrons.forEach((chevron,index) => {
    chevron.addEventListener("click",()=>{
        hidable[index].classList.toggle("show");
        hidable[index].classList.contains("show") ? chevron.setAttribute("src","../Icons/chevron-up.png") : chevron.setAttribute("src","../Icons/chevron-down.png");
    });
});