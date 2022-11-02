        // NAVBAR

// Déclaration des variables
const burger = document.querySelector(".burger");
const navMenu = document.querySelector(".nav-menu");

// Ouverture du menu au clique
burger.addEventListener("click", () => {
    burger.classList.toggle("active");
    navMenu.classList.toggle("active");
})

// Fermeture du menu au clique
document.querySelectorAll(".nav-link").forEach(n => n.addEventListener("click", () => {
    burger.classList.remove("active");
    navMenu.classList.remove("active");
}))