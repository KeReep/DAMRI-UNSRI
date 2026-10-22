<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'head.php';?>
    <style>
        .sidebar{
            background-image : url('../images/damribus.jpg');
        }

    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-[#8C6D73] p-4 sm:p-8">

  
  <div class="w-full max-w-[1000px] bg-[#F3F5F9] rounded-[32px] p-4 sm:p-6 shadow-2xl flex flex-col md:flex-row gap-6 items-stretch my-auto">
    
   
    <div class="w-full md:w-1/2 flex flex-col justify-center px-4 sm:px-8 py-6">

      <div class="text-center md:text-left mb-8 flex flex-col justify-center items-center">
        <h1 class="sm:text-[40px] font-bold text-yellow-600 mb-2 text-shadow-sm text-shadow-blue-600">LOGIN</h1>
        <img src = "../images/logo_damri.png" class="w-[80px] h-[15px] mr-[10px]">
      </div>


      <form action="../backend/auth/login.php" method="POST" class="flex flex-col gap-4 mt-[35px]">
        
  
        <div>
          <input 
            type="email" 
            name="email" 
            placeholder="Email" 
            required
            class="w-full px-5 py-3.5 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition"
          >
        </div>


        <div class="relative">
          <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            required
            class="w-full px-5 py-3.5 rounded-2xl bg-white border border-transparent focus:border-gray-300 text-gray-700 placeholder-gray-400 text-sm outline-none shadow-sm transition pr-12"
          >
          <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <i class="fa-regular fa-eye-slash"></i>
          </button>
        </div>


        <div class="text-right">
          <a href="#" class="text-xs text-gray-400 hover:text-gray-600 transition font-medium">Recovery Password</a>
        </div>

   
        <button 
          type="submit" 
          class="w-full py-3.5 bg-blue-700 hover:bg-blue-800 text-white font-medium rounded-2xl shadow-lg shadow-[#8C6D73]/30 transition duration-200 mt-2"
        >
          Sign In
        </button>

      </form>


      <div class="relative my-8 flex items-center justify-center">
        <div class="border-t border-gray-300 w-full"></div>
        <span class="bg-[#F3F5F9] px-4 text-xs text-gray-400 absolute">Or continue with</span>
      </div>

      <div class="flex justify-center items-center gap-4">
     
        <button class="w-16 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="w-5 h-5">
        </button>
  
        <button class="w-16 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-apple text-xl text-black"></i>
        </button>
     
        <button class="w-16 h-12 bg-white rounded-2xl flex items-center justify-center shadow-sm border border-gray-100 hover:shadow-xl transition">
          <i class="fa-brands fa-facebook text-xl text-[#1877F2]"></i>
        </button>
      </div>

    </div>

   
    <div class=" sidebar w-full md:w-1/2 relative min-h-[350px] md:min-h-[500px] rounded-[24px] overflow-hidden shadow-md flex flex-col justify-end p-8 bg-cover bg-center">
    
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

   
      <div class="relative z-10 text-white">
        <h2 class="text-xl sm:text-2xl font-normal leading-snug mb-6">
          Finally, all your work in one place.
        </h2>

    
        <div class="flex items-center gap-3">
          <button class="w-9 h-9 rounded-full border border-white/40 flex items-center justify-center text-white/80 hover:bg-white/20 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i>
          </button>
          <button class="w-9 h-9 rounded-full border border-white/40 flex items-center justify-center text-white/80 hover:bg-white/20 transition">
            <i class="fa-solid fa-arrow-right text-xs"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/login.js"></script>
  <?php if ($error): ?>
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Login Gagal',
      text: <?= json_encode($error) ?>,
      confirmButtonText: 'OK'
    });
  </script>
  <?php endif; ?>
</body>


</html>