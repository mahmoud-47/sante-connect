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


function localisation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position, erreur);
    } else {
        // Géolocalisation non prise en charge par le navigateur
        console.log("La géolocalisation n'est pas prise en charge par ce navigateur.");
    }
}

function position(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    console.log("Latitude: " + latitude + ", Longitude: " + longitude);
}

function erreur(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.log("L'utilisateur a refusé la demande de géolocalisation.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Les informations de localisation ne sont pas disponibles.");
            break;
        case error.TIMEOUT:
            console.log("La demande pour obtenir la localisation de l'utilisateur a expiré.");
            break;
        case error.UNKNOWN_ERROR:
            console.log("Une erreur inconnue s'est produite.");
            break;
    }
}

// localisation();

