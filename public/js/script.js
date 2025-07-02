/* =================== Typing Animation ======================== */
var typed = new Typed(".typing", {
    strings: ["", "Web Designer", "Web Developer", "Graphic Designer", "Digital Marketer"],
    typeSpeed: 60,       // slower typing (was 40)
    backSpeed: 40,       // slower backspacing (was 80)
    loop: true
});


/* =================== Aside ======================== */

document.addEventListener("DOMContentLoaded", () => {
    const navTogglerBtn = document.querySelector(".nav-toggler");
    const aside = document.querySelector(".aside");
    const allSection = document.querySelectorAll(".section");
    const totalSection = allSection.length;

    if (navTogglerBtn && aside) {
        navTogglerBtn.addEventListener("click", () => {
            aside.classList.toggle("open");
            navTogglerBtn.classList.toggle("open");
            for (let i = 0; i < totalSection; i++) {
                allSection[i].classList.toggle("open");
            }
        });
    } else {
        console.log("navTogglerBtn or aside not found.");
    }
});

