const otpfields = document.querySelectorAll(".field");
otpfields.forEach((otpfield,i) => {
    otpfield.dataset.index = i;
    otpfield.addEventListener("paste", otpPaste);
    otpfield.addEventListener("keyup", otptap);
})

function otpPaste(e){
    const data = e.clipboardData.getData("text");
    let value = data.split("");
    if(value.length == otpfields.length){
        otpfields.forEach((otpfield,i)=>(otpfield.value = value[i]));
        // sub();
    }
}
function otptap(e){
    const otpfield = e.target;
    const value = otpfield.value;
    console.log(e);
    if (isNaN(parseInt(e.key))) {
        e.preventDefault();
        return;
    }
    otpfield.value = "";
    otpfield.value = value ? value[0] : "" ;
    let index = otpfield.dataset.index;
    if(value.length > 0 && index < otpfields.length - 1){
        otpfield.nextElementSibling.focus();
    }
    if(e.key === "Backspace" && index > 0){
        otpfield.previousElementSibling.focus();
        otpfield.previousElementSibling.classList.remove("visited");
    }
    if(index == otpfields.length - 1){
        // sub();
    }
}
// function sub(){
//     console.log("Submit time");
//     let otpcode = "";
//     otpfields.forEach((otpfield,i) => {
//         otpcode += otpfield.value;
//         otpfield.disabled = true;
//         otpfield.classList.add("visited");
//     });
//     console.log(otpcode);
//     //Mohamed c'est ça dont t'as besoin. Le code final est contenu dans la variable optcode
//     document.getElementById("otpform").submit();
// }
