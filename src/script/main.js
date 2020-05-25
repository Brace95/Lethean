function selectMode(mode) {

    if (mode === "night") {

    var theme = document.getElementById("theme");
    theme.classList.remove("light-theme");
    theme.classList.add("dark-theme");

    var imgFilter = document.getElementById("img-filter");
    imgFilter.classList.remove("light-imgFilter");
    imgFilter.classList.add("dark-imgFilter");

    var card = document.getElementById("/\bcard_\d+\b/g");
    card.classList.remove("light-card");
    card.classList.add("dark-card");

    var cardBody = document.getElementById("/\bcard-body_\d+\b/g");
    cardBody.classList.remove("light-card-body");
    cardBody.classList.add("dark-card-body");

    var cardValue = document.getElementById("/\bcard-value_\d+\b/g");
    cardValue.classList.remove("light-card-value");
    cardValue.classList.add("dark-card-value");

    var cardFooter = document.getElementById("/\bcard-footer_\d+\b/g");
    cardFooter.classList.remove("light-card-footer");
    cardFooter.classList.add("dark-card-footer");

    } else if (mode === "light") {
    
    var theme = document.getElementById("theme");
    theme.classList.remove("dark-theme");
    theme.classList.add("light-theme");

    var imgFilter = document.getElementById("img-filter");
    imgFilter.classList.remove("dark-imgFilter");
    imgFilter.classList.add("light-imgFilter");

    var card = document.getElementById("/\bcard_\d+\b/g");
    card.classList.remove("dark-card");
    card.classList.add("light-card");

    var cardBody = document.getElementById("/\bcard-body_\d+\b/g");
    cardBody.classList.remove("dark-card-body");
    cardBody.classList.add("light-card-body");

    var cardValue = document.getElementById("/\bcard-value_\d+\b/g");
    cardValue.classList.remove("dark-card-value");
    cardValue.classList.add("light-card-value");

    var cardFooter = document.getElementById("/\bcard-footer_\d+\b/g");
    cardFooter.classList.remove("dark-card-footer");
    cardFooter.classList.add("light-card-footer");

    }
}