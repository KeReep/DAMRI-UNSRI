<?php
// Informasi database
$host    = 'localhost';
$dbname  = 'damri_unsri';
$user    = 'root';
$pass    = '';          
$charset = 'utf8mb4';
$port = 3306;

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";

$options = [
    // Tampilkan error sebagai exception (bisa ditangkap try/catch)
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    // Hasil query berupa array dengan nama kolom, contoh: $user['email']
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    // Pakai prepared statement
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Buat koneksi
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Koneksi database gagal: ' . $e->getMessage());
}