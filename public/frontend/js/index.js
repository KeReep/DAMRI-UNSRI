
    const humberger = $("#humberger");
    const mobileNav = $("#mobileMenu");


    function closeMenu(){
        mobileNav.addClass("hidden")
        mobileNav.addClass("md:hidden");
        mobileNav.slideToggle(300);
    }
    function openMenu(){
    mobileNav.removeClass("hidden");
    mobileNav.removeClass("md:hidden");
    }
    
    let klik = false
    
    humberger.on("click", () =>{
        if(klik == false){
            openMenu();
            klik = true;
        }else{
            closeMenu();
            klik = false;
        }
    })

$('.nav-link').on('click', function(e) {
        e.stopPropagation();
        
        $('.nav-link').removeClass('text-amber-500 after:w-full');
        $(this).addClass('text-amber-500 after:w-full');
    });

    $(document).on('click', function() {
        $('.nav-link').removeClass('text-amber-500 after:w-full');
    });