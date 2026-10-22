const driver = $(".driver");
const mahasiswa = $(".mahasiswa");
const slider = $(".slider");

driver.on("click",sliderDriver);
mahasiswa.on("click", sliderMahasiswa);

function sliderMahasiswa(){
    slider.removeClass("translate-x-full");
    slider.addClass("translate-x-0");
}
function sliderDriver(){
    slider.removeClass("translate-x-0");
    slider.addClass("translate-x-full");
}