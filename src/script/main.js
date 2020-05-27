function themeSlider() {

    // Get the slider checkbox state
    var themeSlider = document.getElementById("theme-slider");
        
    // Night mode
    if (themeSlider.checked == true) {

        document.body.classList.remove("light-theme");
        document.body.classList.add("dark-theme");

        var imgFilter = document.getElementById("img-filter");
        imgFilter.classList.remove("light-imgFilter");
        imgFilter.classList.add("dark-imgFilter");

        var elements = document.getElementsByClassName("light-card");
        while (elements[0] != null) {
            elements[0].classList.add("dark-card");
            elements[0].classList.remove("light-card");        
        }

        var elements = document.getElementsByClassName("light-card-body");
        while (elements[0] != null) {
            elements[0].classList.add("dark-card-body");
            elements[0].classList.remove("light-card-body");        
        }

        var elements = document.getElementsByClassName("light-card-value");
        while (elements[0] != null) {
            elements[0].classList.add("dark-card-value");
            elements[0].classList.remove("light-card-value");        
        }

        var elements = document.getElementsByClassName("light-card-footer");
        while (elements[0] != null) {
            elements[0].classList.add("dark-card-footer");
            elements[0].classList.remove("light-card-footer");        
        }

    // Light mode
    } else if (themeSlider.checked != true) {

        document.body.classList.remove("dark-theme");
        document.body.classList.add("light-theme");

        var imgFilter = document.getElementById("img-filter");
        imgFilter.classList.add("light-imgFilter");
        imgFilter.classList.remove("dark-imgFilter");

        var elements = document.getElementsByClassName("dark-card");
        while (elements[0] != null) {
            elements[0].classList.add("light-card");
            elements[0].classList.remove("dark-card");        
        }

        var elements = document.getElementsByClassName("dark-card-body");
        while (elements[0] != null) {
            elements[0].classList.add("light-card-body");
            elements[0].classList.remove("dark-card-body");        
        }

        var elements = document.getElementsByClassName("dark-card-value");
        while (elements[0] != null) {
            elements[0].classList.add("light-card-value");
            elements[0].classList.remove("dark-card-value");        
        }

        var elements = document.getElementsByClassName("dark-card-footer");
        while (elements[0] != null) {
            elements[0].classList.add("light-card-footer");
            elements[0].classList.remove("dark-card-footer");        
        }
    }
}