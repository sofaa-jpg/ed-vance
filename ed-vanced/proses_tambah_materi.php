<?php
session_start();
require 'koneksi.php'; // file koneksi ke database Anda

if (isset($_POST['submit'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $mapel = mysqli_real_escape_string($conn, $_POST['mata_pelajaran']);

    // Proses Upload File
    $targetDir = "uploads/"; // folder tempat simpan file, buat folder ini di project Anda
    $fileName = basename($_FILES["file_materi"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx', 'jpg', 'png'];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["file_materi"]["tmp_name"], $targetFilePath)) {
            // Insert ke database
            $stmt = $conn->prepare("INSERT INTO materi (judul, nama_file, mata_pelajaran) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $judul, $fileName, $mapel);

            if ($stmt->execute()) {
                header("Location: materi.php?status=sukses");
                exit();
            } else {
                echo "Gagal menyimpan ke database.";
            }
        } else {
            echo "Gagal upload file.";
        }
    } else {
        echo "Format file tidak didukung. (Hanya pdf/doc/ppt/jpg/png)";
    }
} else {
    header("Location: materi.php");
    exit();
}
?>
