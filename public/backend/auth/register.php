<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once '../config/database.php'; 

if (isset($_POST['submit'])) {
   
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];


    if (empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "<script>alert('Semua kolom wajib diisi!'); window.history.back();</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        
        $sql = "INSERT INTO users (nama, email, password,role) VALUES (:nama, :email, :password , :role)";
        $stmt = $pdo->prepare($sql);

       
        $stmt->execute([
            ':nama' => $username,
            ':email'    => $email,
            ':password' => $hashed_password,
            ':role'     => $role
        ]);

        
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../../frontend/login.php';</script>";

    } catch (PDOException $e) {
      
        if ($e->getCode() == 23000) {
            echo "<script>alert('Gagal: Email sudah terdaftar!'); window.history.back();</script>";
        } else {
            echo "Terjadi kesalahan pada sistem: " . $e->getMessage();
        }
    }
} else {
    
    header("Location: ../../frontend/login.php");
    exit;
}
?>