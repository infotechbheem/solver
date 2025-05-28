


const menu = document.querySelector(".mobilemenu-icon");
const cross = document.querySelector(".cross-icon");
const sidebar = document.querySelector(".page-sidebar");
const overlay = document.querySelector(".overlay");
const header = document.querySelector(".page-header");
const contentWrapper = document.querySelector(".content-wrapper");


const tl = gsap.timeline({
    paused: true,
    onReverseComplete: () => {
        header.style.display = "block";
    }
});

tl.to(sidebar, {
    right: 0,
    duration: 0.4,
    ease: "power3.out",
}, 0)
    .to(overlay, {
        opacity: 1,
        visibility: "visible",
        duration: 0.3,
        ease: "power2.out"
    }, 0);

let sidebarOpen = false;

menu.addEventListener("click", () => {
    sidebarOpen = !sidebarOpen;
    if (sidebarOpen) {
        document.body.classList.add("noscroll");
        tl.play();
        header.style.display = "none";
    } else {
        tl.reverse();
        document.body.classList.remove("noscroll");

    }
});

contentWrapper.addEventListener("click", () => {
    if (sidebarOpen) {
        closeSidebar();
    }
});
// Close sidebar function
function closeSidebar() {
    sidebarOpen = false;
    tl.reverse();
    document.body.classList.remove("noscroll");
}

cross.addEventListener("click", closeSidebar);
overlay.addEventListener("click", closeSidebar);


