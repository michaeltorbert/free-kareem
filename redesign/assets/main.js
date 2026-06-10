// Theme toggle with persistence
(function () {
  const stored = localStorage.getItem("mt-theme");
  const prefersDark = window.matchMedia("(prefers-color-scheme: dark)").matches;
  if (stored === "dark" || (!stored && prefersDark)) {
    document.documentElement.setAttribute("data-theme", "dark");
  }
})();

document.addEventListener("DOMContentLoaded", function () {
  const toggle = document.querySelector(".theme-toggle");
  if (toggle) {
    const sync = () => {
      const dark = document.documentElement.getAttribute("data-theme") === "dark";
      toggle.textContent = dark ? "☀" : "☾";
    };
    sync();
    toggle.addEventListener("click", () => {
      const dark = document.documentElement.getAttribute("data-theme") === "dark";
      document.documentElement.setAttribute("data-theme", dark ? "light" : "dark");
      localStorage.setItem("mt-theme", dark ? "light" : "dark");
      sync();
    });
  }

  const menuBtn = document.querySelector(".menu-btn");
  if (menuBtn) {
    menuBtn.addEventListener("click", () => {
      document.querySelector(".nav-links").classList.toggle("open");
    });
  }

  // Blog category filter
  const chips = document.querySelectorAll(".filter-chip");
  const cards = document.querySelectorAll("[data-cat]");
  chips.forEach((chip) => {
    chip.addEventListener("click", () => {
      chips.forEach((c) => c.classList.remove("active"));
      chip.classList.add("active");
      const cat = chip.dataset.filter;
      cards.forEach((card) => {
        card.style.display =
          cat === "all" || card.dataset.cat === cat ? "" : "none";
      });
    });
  });
});
