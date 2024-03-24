var items = document.querySelectorAll(".slideritem");
var divs = document.querySelectorAll(".divs");

items.forEach((item, index) => {
    item.addEventListener("click", () => {
        divs.forEach((div, divIndex) => {
            if (index === divIndex) {
                div.style.display = "block";
                item.classList.add("bar");
            } else {
                div.style.display = "none";
                items[divIndex].classList.remove("bar");
            }
        });
    });
})