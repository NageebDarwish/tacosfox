let searchIcon = document.getElementById("search-icon");
let searchCancel = document.querySelector(".search-cancel");
let searchBar = document.getElementById("search-form");
let navLinks = document.querySelectorAll(".nav-link");

searchIcon.onclick = () => {
    for (let i = 0; i < navLinks.length; i++) {
        const element = navLinks[i];
        element.classList.toggle("hide-nav-link");
    }
    searchCancel.style.display = "block";
    searchIcon.style.display = "none";
    searchBar.classList.toggle("search-form-show");
};

searchCancel.onclick = () => {
    searchBar.classList.toggle("search-form-show");
    for (let i = 0; i < navLinks.length; i++) {
        const element = navLinks[i];
        element.classList.toggle("hide-nav-link");
    }
    searchCancel.style.display = "none";
    searchIcon.style.display = "block";
};
