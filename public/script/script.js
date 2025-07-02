document.addEventListener("DOMContentLoaded", function () {
    const typingElement = document.querySelector(".typing");

    if (typingElement) {
        var typed = new Typed(".typing", {
            strings: ["", "Web Designer", "Web Developer", "Graphic Designer", "Digital Marketer"],
            typeSpeed: 60,
            backSpeed: 30,
            loop: true
        });
    }

    const navTogglerBtn = document.querySelector(".nav-toggler");
    const aside = document.querySelector(".aside");

    if (navTogglerBtn && aside) {
        navTogglerBtn.addEventListener("click", () => {
            aside.classList.toggle("open");
            navTogglerBtn.classList.toggle("open");
        });
    }
});
