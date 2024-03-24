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

const etoiles = document.querySelectorAll(".starborder");
const note_hidden = document.getElementById("note_user");
var chosen = -1;
note_hidden.value = chosen;
etoiles.forEach((etoile,index)=>{
    etoile.addEventListener("click",()=>{
        if(index == chosen){
            for (let i = 0; i < etoiles.length; i++) 
                    etoiles[i].setAttribute("src","../Icons/Star border.png");
            chosen = -1
        }
        else{
            chosen = index;
            for (let i = 0; i <= index; i++) 
                etoiles[i].setAttribute("src","../Icons/Star_note.png");
            if(index < 4)
                for (let i = index + 1; i < etoiles.length; i++) 
                    etoiles[i].setAttribute("src","../Icons/Star border.png");
        }
        note_hidden.value = chosen;
        console.log(note_hidden.value);
    })
})