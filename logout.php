<?php
session_start();
session_destroy();
header("Location: login_guru.php"); // Arahkan kembali ke halaman login
exit();
