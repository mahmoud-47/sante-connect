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


const accompagnants = document.getElementById("accompagnants");
const accompagnant = document.querySelectorAll(".accompagnant");
const add = document.getElementById("add");
const remove = document.getElementById("remove");
const selects = document.querySelectorAll(".selects");
const montant = document.getElementById("montant");
var displayed = 0;
const montant_enfant = 1500;
const montant_adulte = 2500;

function choices(){
    if(displayed == 0){
        remove.style.display = "none";
        add.style.display = "block";
        accompagnant[0].style.display = "none";
        accompagnant[1].style.display = "none";
        selects[1].value = "_";
        selects[2].value = "_";
        amount_tracker = parseInt(montant.innerHTML) - montant_enfant - montant_adulte; 
    }
    else if(displayed == 1){
        remove.style.display = "block";
        add.style.display = "block";
        accompagnant[0].style.display = "flex";
        accompagnant[1].style.display = "none";
        selects[2].value = "_";
    }
    else if(displayed == 2){
        remove.style.display = "block";
        add.style.display = "none";
        accompagnant[0].style.display = "flex";
        accompagnant[1].style.display = "flex";
    }
    updateMontant();
}
add.addEventListener("click",()=>{
    displayed++;
    choices();
})
remove.addEventListener("click",()=>{
    displayed--;
    choices();
})

selects.forEach((select) => {
    select.addEventListener('change', updateMontant);
});

function updateMontant() {
    let totalMontant = 0;

    for (let i = 0; i < accompagnant.length + 1; i++) {
        const selectValue = selects[i].value;

        if (selectValue === 'enfant') {
            totalMontant += montant_enfant;
        } else if (selectValue === 'adulte') {
            totalMontant += montant_adulte;
        }
    }

    montant.innerHTML = totalMontant;
}