var coeur=document.getElementById("heart");
coeur.addEventListener("click",()=>{
    console.log("clicked");
    heart.classList.toggle("liked");
    if(coeur.classList.contains("liked")){
        coeur.setAttribute("src","../../../Icons/Favorite.png");
    }else{
        coeur.setAttribute("src","../../../Icons/Heart_blue.png");

    }
})