
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

  $(function() {
    const slider = $("#tabIndicator");
    const tabIndralaya = $("#tabIndralaya");
    const tabBukit = $("#tabBukit");
    const indralaya = $("#timelineIndralaya");
    const bukit = $("#timelineBukit");

    // Klik Tab Bukit (Posisi Kiri)
    tabBukit.on("click", () => {
        slider.addClass("translate-x-0").removeClass("translate-x-full");
        
        // Ubah warna teks tombol
        tabBukit.addClass("text-white").removeClass("text-slate-500 hover:text-slate-700");
        tabIndralaya.addClass("text-slate-500 hover:text-slate-700").removeClass("text-white");
        
        // Tampilkan timeline Bukit
        bukit.removeClass("hidden");
        indralaya.addClass("hidden");
    });

    // Klik Tab Indralaya (Posisi Kanan)
    tabIndralaya.on("click", () => {
        slider.addClass("translate-x-full").removeClass("translate-x-0");
        
        // Ubah warna teks tombol
        tabIndralaya.addClass("text-white").removeClass("text-slate-500 hover:text-slate-700");
        tabBukit.addClass("text-slate-500 hover:text-slate-700").removeClass("text-white");
        
        // Tampilkan timeline Indralaya
        indralaya.removeClass("hidden");
        bukit.addClass("hidden");
    });
});





    