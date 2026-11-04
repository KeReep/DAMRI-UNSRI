<?php
// public/frontend/cariTiket.php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Tiket - DAMRI UNSRI</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F0F4F8] min-h-screen text-slate-700 pb-12">

    <!-- Container Utama -->
    <div class="max-w-4xl mx-auto px-4 pt-6">

        <!-- 1. Tombol Back -->
        <div class="mb-6">
            <a href="index.php" class="inline-flex items-center gap-2 bg-[#E2E8F0] hover:bg-slate-300 text-slate-700 px-5 py-2.5 rounded-full font-medium text-sm transition-all shadow-sm">
                <i class="fa-solid fa-arrow-left text-xs"></i>
                <span>Back</span>
            </a>
        </div>

        <!-- 2. Form Pencarian Format Vertikal -->
        <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100 mb-8">
            <h2 class="text-lg font-bold text-slate-800 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-bus text-[#1E3A8A]"></i> Cari Jadwal Bus DAMRI
            </h2>

            <form id="searchForm" action="cariTiket.php" method="GET" class="space-y-4">
                
                <!-- Input: Dari Kampus / Halte -->
                <div class="bg-[#F8FAFC] rounded-2xl p-3.5 px-5 border border-slate-100">
                    <label class="text-[10px] font-bold tracking-wider text-slate-400 uppercase flex items-center gap-1.5 mb-1">
                        <i class="fa-solid fa-location-dot text-amber-500"></i> Dari Kampus / Halte
                    </label>
                    <select id="asalSelect" name="asal" class="bg-transparent text-slate-800 font-semibold text-sm focus:outline-none w-full cursor-pointer">
                        <option value="Halte Unsri Bukit">Halte Unsri Bukit</option>
                        <option value="Terminal Unsri Indralaya">Terminal Unsri Indralaya</option>
                    </select>
                </div>

                <!-- Input: Tujuan -->
                <div class="bg-[#F8FAFC] rounded-2xl p-3.5 px-5 border border-slate-100">
                    <label class="text-[10px] font-bold tracking-wider text-slate-400 uppercase flex items-center gap-1.5 mb-1">
                        <i class="fa-solid fa-compass text-blue-500"></i> Tujuan
                    </label>
                    <select id="tujuanSelect" name="tujuan" class="bg-transparent text-slate-800 font-semibold text-sm focus:outline-none w-full cursor-pointer">
                        <option value="Terminal Unsri Indralaya">Terminal Unsri Indralaya</option>
                        <option value="Halte Unsri Bukit">Halte Unsri Bukit</option>
                    </select>
                </div>

                <!-- Input: Jam Keberangkatan -->
                <div class="bg-[#F8FAFC] rounded-2xl p-3.5 px-5 border border-slate-100">
                    <label class="text-[10px] font-bold tracking-wider text-slate-400 uppercase flex items-center gap-1.5 mb-1">
                        <i class="fa-regular fa-clock text-emerald-500"></i> Jam Keberangkatan
                    </label>
                    <input type="time" id="jamInput" name="jam" class="bg-transparent text-slate-800 font-semibold text-sm focus:outline-none w-full cursor-pointer" value="07:00">
                </div>

                <!-- Tombol Cari Tiket -->
                <button type="submit" class="w-full bg-[#1E3A8A] hover:bg-blue-900 text-white font-semibold py-4 rounded-2xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 mt-2">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                    <span>Cari Tiket Sekarang</span>
                </button>

            </form>
        </div>

        <!-- 3. Sub-header & Jumlah Bus -->
        <div class="flex items-center justify-between mb-5 px-2">
            <h2 class="text-sm font-semibold text-slate-600">Berikut Jadwal yang tersedia pada saat ini</h2>
            <span class="text-xs font-semibold text-slate-400 bg-slate-200/60 px-3 py-1 rounded-full" id="busCountText">10 Bus Tersedia</span>
        </div>

        <!-- 4. Daftar Kartu Bus -->
        <div class="space-y-4" id="busListContainer">

            <?php
            // Data Dummy 10 Bus dengan kapasitas 40 Kursi
            $buses = [
                ["jam" => "06:00", "tiba" => "06:45", "sisa" => 0, "status" => "Dalam perjalanan", "icon_color" => "text-emerald-500"],
                ["jam" => "07:00", "tiba" => "07:45", "sisa" => 8, "status" => "Dalam perjalanan", "icon_color" => "text-emerald-500"],
                ["jam" => "08:00", "tiba" => "08:45", "sisa" => 15, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "09:00", "tiba" => "09:45", "sisa" => 28, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "10:00", "tiba" => "10:45", "sisa" => 40, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "11:00", "tiba" => "11:45", "sisa" => 40, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "13:00", "tiba" => "13:45", "sisa" => 32, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "14:00", "tiba" => "14:45", "sisa" => 10, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "15:00", "tiba" => "15:45", "sisa" => 40, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
                ["jam" => "16:30", "tiba" => "17:15", "sisa" => 40, "status" => "Menunggu keberangkatan", "icon_color" => "text-slate-400"],
            ];

            foreach ($buses as $bus) {
                // Warna badge kursi
                $kursiBg = $bus['sisa'] > 15 ? "bg-emerald-100 text-emerald-700" : ($bus['sisa'] > 0 ? "bg-amber-100 text-amber-700" : "bg-red-100 text-red-700");
                $kursiTeks = $bus['sisa'] == 0 ? "Penuh" : "Sisa " . $bus['sisa'] . " Kursi";
            ?>
            <!-- Card Bus -->
            <div class="bg-white rounded-3xl p-5 md:p-6 shadow-sm border border-slate-100 flex flex-col hover:shadow-md transition-shadow">
                
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <!-- Info Bus & Badge Logo -->
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-2xl bg-[#1E3A8A] text-amber-400 flex items-center justify-center text-2xl shadow-inner shrink-0">
                            <i class="fa-solid fa-bus"></i>
                        </div>
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <h3 class="font-bold text-slate-800 text-lg">DAMRI</h3>
                                <span class="<?= $kursiBg ?> text-[11px] font-semibold px-2.5 py-0.5 rounded-full"><?= $kursiTeks ?></span>
                            </div>
                            <p class="text-xs text-slate-400 font-medium flex items-center gap-1.5">
                                <i class="fa-solid fa-circle-check <?= $bus['icon_color'] ?>"></i> Status : <?= $bus['status'] ?>
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Rute & Jam -->
                    <div class="flex items-center justify-center gap-4 text-center my-2 md:my-0 overflow-hidden">
                        <div>
                            <span class="block text-xl font-bold text-slate-800"><?= $bus['jam'] ?> <span class="text-sm font-medium text-slate-500">WIB</span></span>
                            <span class="text-xs text-slate-400 font-medium">Bukit</span>
                        </div>
                        <div class="flex flex-col items-center px-1 md:px-2">
                            <span class="text-[11px] font-semibold text-amber-500 mb-1">45 Menit</span>
                            <div class="relative flex items-center w-32 md:w-44">
                                <div class="h-[2px] bg-slate-200 w-full"></div>
                                <i class="fa-solid fa-bus text-xs text-amber-500 absolute left-1/2 -translate-x-1/2 bg-white px-1"></i>
                            </div>
                            <span class="text-[10px] text-slate-400 mt-1 whitespace-nowrap">Via Tol Palembang - Indralaya</span>
                        </div>
                        <div>
                            <span class="block text-xl font-bold text-slate-800"><?= $bus['tiba'] ?> <span class="text-sm font-medium text-slate-500">WIB</span></span>
                            <span class="text-xs text-slate-400 font-medium">Indralaya</span>
                        </div>
                    </div>

                    <!-- Harga & Tombol Pilih -->
                    <div class="flex md:flex-col items-center md:items-end justify-between md:justify-center border-t md:border-t-0 pt-4 md:pt-0 border-slate-100">
                        <div class="text-left md:text-right">
                            <span class="block text-[10px] text-slate-400 font-medium">Tarif Mahasiswa</span>
                            <span class="text-xl font-bold text-amber-500">Rp 15.000</span>
                        </div>
                        <button onclick="openSeatModal('DAMRI', '<?= $bus['jam'] ?>', 'Rp 15.000')" <?= $bus['sisa'] == 0 ? 'disabled' : '' ?> class="<?= $bus['sisa'] == 0 ? 'bg-slate-300 cursor-not-allowed' : 'bg-[#1E3A8A] hover:bg-blue-900' ?> text-white text-sm font-semibold px-5 py-2.5 rounded-xl transition-all shadow-sm flex items-center gap-2 mt-2">
                            <span>Pilih Kursi</span>
                            <i class="fa-solid fa-chevron-right text-xs"></i>
                        </button>
                    </div>
                </div>

            </div>
            <?php } ?>

        </div>

    </div>

    <!-- 5. Modal Pilih Kursi Bus (Total 40 Kursi) -->
    <div id="seatModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-100 m-4 max-h-[85vh] flex flex-col">
            
            <!-- Header Modal -->
            <div class="flex items-center justify-between mb-3 border-b pb-3 border-slate-100 shrink-0">
                <div>
                    <h3 class="font-bold text-slate-800 text-lg" id="modalBusName">Pilih Kursi</h3>
                    <p class="text-xs text-slate-400" id="modalBusDetail">Jam 07:00 WIB • Tarif Rp 15.000</p>
                </div>
                <button onclick="closeSeatModal()" class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 flex items-center justify-center hover:bg-slate-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Keterangan Status Warna -->
            <div class="flex items-center justify-center gap-4 text-xs font-medium text-slate-500 mb-3 shrink-0">
                <div class="flex items-center gap-1.5">
                    <div class="w-3.5 h-3.5 rounded bg-emerald-100 border border-emerald-400"></div>
                    <span>Tersedia</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <div class="w-3.5 h-3.5 rounded bg-amber-500 border border-amber-600"></div>
                    <span>Dipilih</span>
                </div>
                <div class="flex items-center gap-1.5">
                    <div class="w-3.5 h-3.5 rounded bg-slate-200 border border-slate-300"></div>
                    <span>Terisi</span>
                </div>
            </div>
            
            <!-- Denah Kursi Scrollable (Grid 5 Kolom) -->
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 overflow-y-auto flex-1 mb-4">
                <div class="flex justify-between items-center text-xs font-semibold text-slate-400 mb-4 px-1 uppercase tracking-wider">
                    <span><i class="fa-solid fa-user text-slate-500 mr-1"></i> Supir</span>
                    <span>Pintu <i class="fa-solid fa-door-open ml-1"></i></span>
                </div>
                
                <div class="grid grid-cols-5 gap-2 text-center text-xs font-bold text-slate-600" id="seatGrid">
                    
                    <!-- Baris 1 -->
                    <button onclick="selectSeat(this, '1A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">1A</button>
                    <button onclick="selectSeat(this, '1B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">1B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '1C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">1C</button>
                    <div class="p-2.5 rounded-lg bg-slate-200 text-slate-400 cursor-not-allowed flex items-center justify-center text-[10px]">Pintu</div>

                    <!-- Baris 2 s.d. 9 -->
                    <button onclick="selectSeat(this, '2A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">2A</button>
                    <button onclick="selectSeat(this, '2B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">2B</button>
                    <div class="col-span-1"></div>
                    <div class="p-2.5 rounded-lg bg-slate-200 text-slate-400 cursor-not-allowed">2C</div>
                    <button onclick="selectSeat(this, '2D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">2D</button>

                    <button onclick="selectSeat(this, '3A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">3A</button>
                    <button onclick="selectSeat(this, '3B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">3B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '3C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">3C</button>
                    <button onclick="selectSeat(this, '3D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">3D</button>

                    <button onclick="selectSeat(this, '4A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">4A</button>
                    <div class="p-2.5 rounded-lg bg-slate-200 text-slate-400 cursor-not-allowed">4B</div>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '4C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">4C</button>
                    <button onclick="selectSeat(this, '4D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">4D</button>

                    <button onclick="selectSeat(this, '5A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">5A</button>
                    <button onclick="selectSeat(this, '5B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">5B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '5C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">5C</button>
                    <button onclick="selectSeat(this, '5D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">5D</button>

                    <button onclick="selectSeat(this, '6A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">6A</button>
                    <button onclick="selectSeat(this, '6B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">6B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '6C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">6C</button>
                    <div class="p-2.5 rounded-lg bg-slate-200 text-slate-400 cursor-not-allowed">6D</div>

                    <button onclick="selectSeat(this, '7A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">7A</button>
                    <button onclick="selectSeat(this, '7B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">7B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '7C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">7C</button>
                    <button onclick="selectSeat(this, '7D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">7D</button>

                    <button onclick="selectSeat(this, '8A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">8A</button>
                    <button onclick="selectSeat(this, '8B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">8B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '8C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">8C</button>
                    <button onclick="selectSeat(this, '8D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">8D</button>

                    <button onclick="selectSeat(this, '9A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">9A</button>
                    <button onclick="selectSeat(this, '9B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">9B</button>
                    <div class="col-span-1"></div>
                    <button onclick="selectSeat(this, '9C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">9C</button>
                    <button onclick="selectSeat(this, '9D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">9D</button>

                    <!-- Baris 10 Belakang -->
                    <button onclick="selectSeat(this, '10A')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">10A</button>
                    <button onclick="selectSeat(this, '10B')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">10B</button>
                    <button onclick="selectSeat(this, '10C')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">10C</button>
                    <button onclick="selectSeat(this, '10D')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">10D</button>
                    <button onclick="selectSeat(this, '10E')" class="seat-btn p-2.5 rounded-lg bg-emerald-100 text-emerald-700 hover:bg-emerald-200 transition-colors">10E</button>
                
                </div>
            </div>

            <!-- Tombol Aksi -->
            <button onclick="processPayment()" class="w-full bg-[#F59E0B] hover:bg-amber-600 text-white font-semibold py-3 rounded-xl transition-all shadow-md shrink-0">
                Lanjutkan Pembayaran
            </button>
        </div>
    </div>

    <!-- 6. MODAL E-TIKET (DETAIL TIKET YANG SUDAH DIPESAN) -->
    <div id="ticketDetailModal" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 shadow-2xl border border-slate-100 m-4 relative overflow-hidden">
            
            <!-- Ornamen Atas -->
            <div class="bg-[#1E3A8A] -mx-6 -mt-6 p-6 text-white text-center relative mb-6">
                <span class="bg-emerald-500/20 text-emerald-300 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full border border-emerald-400/30">
                    <i class="fa-solid fa-circle-check mr-1"></i> Pembayaran Berhasil
                </span>
                <h3 class="font-bold text-xl mt-2">E-Tiket DAMRI UNSRI</h3>
                <p class="text-xs text-slate-300 mt-1">Simpan e-tiket ini saat menaiki bus</p>
                <button onclick="closeTicketModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-white/10 text-white flex items-center justify-center hover:bg-white/20">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Kartu Tiket Detail -->
            <div class="space-y-4">
                
                <!-- Barcode Visual -->
                <div class="bg-slate-50 border border-slate-200 p-4 rounded-2xl text-center">
                    <div class="flex justify-center items-center gap-1 mb-1 text-slate-800">
                        <i class="fa-solid fa-barcode text-4xl tracking-widest"></i>
                        <i class="fa-solid fa-barcode text-4xl tracking-widest"></i>
                    </div>
                    <span class="text-xs font-mono font-bold tracking-widest text-slate-500" id="ticketCodeText">DMR-202611-8942</span>
                </div>

                <!-- Informasi Rute & Waktu -->
                <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100 space-y-3">
                    <div class="flex justify-between items-center text-xs text-slate-400 font-medium">
                        <span>Layanan Bus</span>
                        <span class="font-bold text-[#1E3A8A]">DAMRI Executive</span>
                    </div>

                    <div class="flex items-center justify-between pt-2 border-t border-slate-200/60">
                        <div>
                            <span class="block text-xs text-slate-400">Dari</span>
                            <span class="font-bold text-slate-800 text-sm" id="ticketAsal">Halte Unsri Bukit</span>
                        </div>
                        <i class="fa-solid fa-arrow-right text-slate-300 text-xs"></i>
                        <div class="text-right">
                            <span class="block text-xs text-slate-400">Tujuan</span>
                            <span class="font-bold text-slate-800 text-sm" id="ticketTujuan">Terminal Unsri Indralaya</span>
                        </div>
                    </div>
                </div>

                <!-- Grid Rincian -->
                <div class="grid grid-cols-2 gap-3 text-xs">
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="block text-slate-400 text-[10px]">Jam Keberangkatan</span>
                        <span class="font-bold text-slate-800 text-sm" id="ticketJam">07:00 WIB</span>
                    </div>
                    <div class="bg-amber-50 p-3 rounded-xl border border-amber-100">
                        <span class="block text-amber-600 text-[10px]">Nomor Kursi</span>
                        <span class="font-bold text-amber-600 text-base" id="ticketKursi">3A</span>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="block text-slate-400 text-[10px]">Tarif Tiket</span>
                        <span class="font-bold text-slate-800" id="ticketHarga">Rp 15.000</span>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                        <span class="block text-slate-400 text-[10px]">Status Tiket</span>
                        <span class="font-bold text-emerald-600">LUNAS</span>
                    </div>
                </div>

            </div>

            <!-- Tombol Selesai & Cetak -->
            <div class="flex gap-2 mt-6">
                <button onclick="window.print()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold py-3 rounded-xl text-xs transition-colors flex items-center justify-center gap-1.5">
                    <i class="fa-solid fa-print"></i> Cetak Tiket
                </button>
                <button onclick="closeTicketModal()" class="flex-1 bg-[#1E3A8A] hover:bg-blue-900 text-white font-semibold py-3 rounded-xl text-xs transition-colors shadow-md">
                    Selesai
                </button>
            </div>

        </div>
    </div>

    <!-- Script Logic Modal & Interaksi -->
    <script>
        let currentBusName = '';
        let currentJam = '';
        let currentHarga = '';
        let selectedSeatNum = '';

        function openSeatModal(busName, jam, harga) {
            currentBusName = busName;
            currentJam = jam;
            currentHarga = harga;
            selectedSeatNum = '';
            
            // Reset pilihan kursi sebelumnya
            document.querySelectorAll('.seat-btn').forEach(btn => {
                btn.classList.remove('bg-amber-500', 'text-white', 'hover:bg-amber-600');
                btn.classList.add('bg-emerald-100', 'text-emerald-700', 'hover:bg-emerald-200');
            });

            document.getElementById('modalBusName').innerText = busName;
            document.getElementById('modalBusDetail').innerText = `Jam Keberangkatan ${jam} WIB • ${harga}`;
            document.getElementById('seatModal').classList.remove('hidden');
        }

        function closeSeatModal() {
            document.getElementById('seatModal').classList.add('hidden');
        }

        function selectSeat(button, seatNum) {
            // Reset warna kursi lain
            document.querySelectorAll('.seat-btn').forEach(btn => {
                btn.classList.remove('bg-amber-500', 'text-white', 'hover:bg-amber-600');
                btn.classList.add('bg-emerald-100', 'text-emerald-700', 'hover:bg-emerald-200');
            });

            // Tandai kursi terpilih
            button.classList.remove('bg-emerald-100', 'text-emerald-700', 'hover:bg-emerald-200');
            button.classList.add('bg-amber-500', 'text-white', 'hover:bg-amber-600');
            
            selectedSeatNum = seatNum;
        }

        function processPayment() {
            if (!selectedSeatNum) {
                alert('Silakan pilih nomor kursi terlebih dahulu!');
                return;
            }

            // Tutup Modal Kursi
            closeSeatModal();

            // Ambil Rute Dari Input Select
            const asal = document.getElementById('asalSelect').value;
            const tujuan = document.getElementById('tujuanSelect').value;
            const randomCode = 'DMR-' + Math.floor(100000 + Math.random() * 900000);

            // Populate Data ke Modal Detail Tiket
            document.getElementById('ticketCodeText').innerText = randomCode;
            document.getElementById('ticketAsal').innerText = asal;
            document.getElementById('ticketTujuan').innerText = tujuan;
            document.getElementById('ticketJam').innerText = currentJam + ' WIB';
            document.getElementById('ticketKursi').innerText = selectedSeatNum;
            document.getElementById('ticketHarga').innerText = currentHarga;

            // Buka Modal Detail Tiket
            document.getElementById('ticketDetailModal').classList.remove('hidden');
        }

        function closeTicketModal() {
            document.getElementById('ticketDetailModal').classList.add('hidden');
        }
    </script>
</body>
</html>