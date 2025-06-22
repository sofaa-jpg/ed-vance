<?php
// Konfigurasi Database
$host = "localhost"; // Nama host
$user = "root"; // Username database
$password = ""; // Password database
$database = "edvanced"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}