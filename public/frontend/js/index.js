const humberger = $(".humberger");
const mobileNav = $("#mobileMenu");


function openMenu(){
    mobileNav.Classremove("hidden");
    mobileNav.Classremove("md:hidden");
}

humberger.on("click", openMenu);