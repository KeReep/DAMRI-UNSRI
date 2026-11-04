<!DOCTYPE html>
<html lang="id">
<head>
    <?php include 'head.php';?> 
    <style>
        * {
            transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease, color 0.2s ease;
        }

        body.mode-solid {
            background-color: #f1f5f9;
            color: #1e293b;
        }
        body.mode-solid .app-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 25px -5px rgba(30, 58, 138, 0.05);
        }

        body.mode-glass {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 40%, #1e3a8a 100%);
            background-attachment: fixed;
            color: #f8fafc;
        }
        body.mode-glass .app-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #f8fafc;
        }
        body.mode-glass .text-slate-800, body.mode-glass .text-slate-700 { color: #f8fafc !important; }
        body.mode-glass .text-slate-500, body.mode-glass .text-slate-400 { color: #cbd5e1 !important; }
        body.mode-glass .bg-slate-50, body.mode-glass .bg-slate-100 {
            background-color: rgba(255, 255, 255, 0.08) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
    </style>
</head>
<body class="mode-solid font-sans antialiased min-h-screen p-3 sm:p-5 lg:p-6">

    <div class="max-w-[1400px] mx-auto space-y-6">

        <div class="flex items-center justify-between">
            <a href="index.php" class="inline-flex items-center gap-2 px-4 py-2 bg-slate-200 hover:bg-slate-300 rounded-2xl text-xs font-bold text-slate-700 transition-all">
                <i class="fa-solid fa-arrow-left"></i> Back to Landing Page
            </a>
        </div>


        <section class="app-card p-5 sm:p-6 rounded-[2.5rem] shadow-lg">
            <form id="search-form" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
               
                <div class="md:col-span-3 space-y-1">
                    <label class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-location-dot text-amber-500"></i> Dari Kampus / Halte
                    </label>
                    <select id="origin-select" class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <option class="" value="bukit">Halte Unsri Bukit</option>
                        <option value="indralaya">Terminal Unsri Indralaya</option>
                    </select>
                </div>

             
                <div class="md:col-span-1 flex justify-center">
                    <button type="button" id="btn-swap" class="w-10 h-10 rounded-2xl bg-amber-500 hover:bg-amber-600 text-damri-navy font-bold flex items-center justify-center shadow-md transition-all">
                        <i class="fa-solid fa-right-left"></i>
                    </button>
                </div>

            
                <div class="md:col-span-3 space-y-1">
                    <label class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-location-crosshairs text-blue-500"></i> Tujuan
                    </label>
                    <select id="destination-select" class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        <option value="indralaya">Terminal Unsri Indralaya</option>
                        <option value="bukit">Halte Unsri Bukit</option>
                    </select>
                </div>

              
                <div class="md:col-span-3 space-y-1">
                    <label class="text-[11px] font-extrabold text-slate-500 uppercase tracking-wider flex items-center gap-1.5">
                        <i class="fa-solid fa-calendar-days text-emerald-500"></i> Jam
                    </label>
                    <input type="time" value="2026-11-04" class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-2xl text-xs font-bold text-slate-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                </div>

                <div class="md:col-span-2 pt-2 md:pt-5">
                    <button type="submit" class="w-full py-3.5 bg-damri-navy hover:bg-blue-900 text-white font-extrabold text-xs rounded-2xl shadow-lg transition-all flex items-center justify-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-magnifying-glas search"></i> Cari Tiket
                    </button>
                </div>
            </form>
        </section>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

            <main class="lg:col-span-9 space-y-4">

            
                <div class="flex items-center justify-between px-2">
                    <p class="desc text-xs font-bold text-slate-600">
                        Berikut Jadwal yang tersedia pada saat ini
                    </p>
                    <span class="text-xs text-slate-400">3 Bus Tersedia</span>
                </div>

                <!-- CARD BUS ITEM 1 -->
                <div class="app-card p-5 sm:p-6 rounded-[2.5rem] border border-slate-200 transition-all hover:border-amber-400">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                        
                        <!-- Info Armada -->
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-damri-navy text-amber-400 font-black text-2xl flex items-center justify-center shrink-0 shadow-md">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h4 class="font-black text-base text-slate-800">DAMRI PUTIH</h4>
                                    <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-700 font-bold text-[10px] rounded-full">Sisa 8 Kursi</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1 flex items-center gap-3">
                                    <span><i class="fa-solid fa-snowflake text-blue-400"></i> Status : Menunggu keberangkatan</span>
                                </p>
                            </div>
                        </div>

                        <!-- Info Jam & Rute -->
                        <div class="flex items-center gap-4 text-center">
                            <div>
                                <span class="text-lg font-black text-slate-800">07:00</span>
                                <span class="text-[10px] text-slate-400 block font-bold">Bukit</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span class="text-[10px] font-bold text-amber-600">45 Menit</span>
                                <div class="w-20 sm:w-28 h-0.5 bg-slate-300 relative my-1">
                                    <i class="fa-solid fa-bus text-[10px] text-damri-navy absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-1"></i>
                                </div>
                                <span class="text-[9px] text-slate-400">Via Tol Palindra</span>
                            </div>
                            <div>
                                <span class="text-lg font-black text-slate-800">07:45</span>
                                <span class="text-[10px] text-slate-400 block font-bold">Indralaya</span>
                            </div>
                        </div>

                        <!-- Harga & Action -->
                        <div class="flex md:flex-col items-center md:items-end justify-between border-t md:border-t-0 pt-3 md:pt-0 border-slate-200">
                            <div>
                                <a href = "detailTiket.php"><span class="text-[10px] text-slate-400 block text-right">Cek Detail Tiket</span></a>
                                <span class="text-xl font-black text-amber-500">Rp 25.000</span>
                                
                            </div>
                            
                            <button class="btn-pilih-kursi mt-2 px-5 py-2.5 bg-damri-navy hover:bg-blue-900 text-white font-extrabold text-xs rounded-2xl shadow transition-all cursor-pointer">
                                Pilih Kursi <i class="fa-solid fa-chevron-right text-[10px] ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

             
                <div class="app-card p-5 sm:p-6 rounded-[2.5rem] border border-slate-200 transition-all hover:border-amber-400">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-5">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 rounded-2xl bg-amber-500 text-damri-navy font-black text-2xl flex items-center justify-center shrink-0 shadow-md">
                                <i class="fa-solid fa-bus"></i>
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <h4 class="font-black text-base text-slate-800">DAMRI BIRU</h4>
                                    <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-700 font-bold text-[10px] rounded-full">Sisa 14 Kursi</span>
                                </div>
                                <p class="text-xs text-slate-500 mt-1 flex items-center gap-3">
                                    <span><i class="fa-solid fa-snowflake text-blue-400"></i> Status : Dalam perjalanan</span>
                                    <span><i class="fa-solid fa-chair text-slate-400"></i> Seat 2-2</span>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 text-center">
                            <div>
                                <span class="text-lg font-black text-slate-800">09:30</span>
                                <span class="text-[10px] text-slate-400 block font-bold">Bukit</span>
                            </div>
                            <div class="flex flex-col items-center">
                                <span class="text-[10px] font-bold text-amber-600">45 Menit</span>
                                <div class="w-20 sm:w-28 h-0.5 bg-slate-300 relative my-1">
                                    <i class="fa-solid fa-bus text-[10px] text-damri-navy absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-1"></i>
                                </div>
                                <span class="text-[9px] text-slate-400">Via Tol Palindra</span>
                            </div>
                            <div>
                                <span class="text-lg font-black text-slate-800">10:15</span>
                                <span class="text-[10px] text-slate-400 block font-bold">Indralaya</span>
                            </div>
                        </div>

                        <div class="flex md:flex-col items-center md:items-end justify-between border-t md:border-t-0 pt-3 md:pt-0 border-slate-200">
                            <div>
                                <span class="text-[10px] text-slate-400 block text-right">Tarif Mahasiswa</span>
                                <span class="text-xl font-black text-amber-500">Rp 15.000</span>
                            </div>
                            <button class="btn-pilih-kursi mt-2 px-5 py-2.5 bg-damri-navy hover:bg-blue-900 text-white font-extrabold text-xs rounded-2xl shadow transition-all cursor-pointer">
                                Pilih Kursi <i class="fa-solid fa-chevron-right text-[10px] ml-1"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </main>
        </div>

    </div>

    <!-- Toast Notification -->
    <div id="toast" class="fixed bottom-6 right-6 z-50 bg-slate-900 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-300 pointer-events-none text-xs">
        <i id="toastIcon" class="fa-solid fa-circle-check text-amber-400 text-base"></i>
        <span id="toastMsg" class="font-medium">Notifikasi</span>
    </div>


<script>
       
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


</script>
</body>
</html>