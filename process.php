<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenis_kelamin = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);
    $agama = mysqli_real_escape_string($conn, $_POST['agama']);
    $sekolah_asal = mysqli_real_escape_string($conn, $_POST['sekolah_asal']);
    
    // Insert data into database
    $sql = "INSERT INTO siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) 
            VALUES ('$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "Pendaftaran berhasil! Data siswa telah disimpan.";
        
        // Redirect to the list page after successful registration
        header("Location: list_students.php");
        exit();
    } else {
        $message = "Error: " . $sql . "<br>" . mysqli_error($conn);
        
        // Redirect back to the form with the error message
        header("Location: index.php?message=" . urlencode($message));
        exit();
    }
}

// If someone accesses this page directly without form submission
header("Location: index.php");
exit();
?>