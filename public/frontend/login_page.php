<?php
session_start();

// Cek apabila sudah login, tidak perlu ke login page
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}

// Ambil flash error dari session, lalu hapus supaya tampil sekali saja
$error = $_SESSION['flash_error'] ?? null;
unset($_SESSION['flash_error']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>

  <form action="../../backend/auth/login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php if ($error): ?>
  <script>
    // Tampilkan pop up error
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