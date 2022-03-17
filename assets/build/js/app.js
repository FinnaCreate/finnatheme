(() => {
  // resources/scripts/app.ts
  window.addEventListener("load", function() {
    const mainNavigation = document.querySelector("#primary-menu");
    const closeMenuButton = document.querySelector("div[data-menu-close]");
    const openMenuButton = document.querySelector("div[data-menu-open]");
    const openMenuHamburger = document.querySelector("div[data-menu-hamburger]");
    document.querySelector("#primary-menu-toggle-container").addEventListener("click", function(e) {
      e.preventDefault();
      mainNavigation.classList.toggle("hidden");
      closeMenuButton.classList.toggle("hidden");
      openMenuButton.classList.toggle("lg:flex");
      openMenuHamburger.classList.toggle("hidden");
    });
  });
})();
