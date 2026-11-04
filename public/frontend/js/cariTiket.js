$(document).ready(function() {
    
    $('#btn-swap').on('click', function() {
    
        const originVal = $('#origin-select').val();
        const destVal = $('#destination-select').val();
        

        $('#origin-select').val(destVal);
        $('#destination-select').val(originVal);
    });


    $('#search-form').on('submit', function(event) {

        event.preventDefault(); 

       
        const asalTerpilih = $('#origin-select').val();
        const tujuanTerpilih = $('#destination-select').val();
        
     
        const teksAsal = $('#origin-select').find('option:selected').text();
        const teksTujuan = $('#destination-select').find('option:selected').text();

        console.log("Asal (Value): " + asalTerpilih + " | Teks: " + teksAsal);
        console.log("Tujuan (Value): " + tujuanTerpilih + " | Teks: " + teksTujuan);
        
        alert(`Mencari tiket dari ${teksAsal} menuju ${teksTujuan}`);
    });

});