import "./bootstrap";
import "preline";
import Alpine from "alpinejs";
import ApexCharts from "apexcharts";
import { HSOverlay } from "preline/preline";

Alpine.start();

const menuOpenBtn = document.getElementById("menuOpenBtn");
const menuCloseBtn = document.getElementById("menuCloseBtn");
const mobileMenu = document.getElementById("mobileMenu");

if (window.innerWidth <= 768) {
    mobileMenu.style.maxHeight = "0px";
    mobileMenu.style.minHeight = "0px";

    menuOpenBtn.addEventListener("click", () => {
        mobileMenu.style.maxHeight = "100vh";
        mobileMenu.style.minHeight = "100vh";
    });

    menuCloseBtn.addEventListener("click", () => {
        mobileMenu.style.maxHeight = "0px";
        mobileMenu.style.minHeight = "0px";
    });
}
