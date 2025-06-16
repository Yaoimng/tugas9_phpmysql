<?php
require_once 'config.php';

// Fetch all student records from the database
$sql = "SELECT * FROM siswa ORDER BY tanggal_daftar DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftaran Siswa</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Additional styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffcc;
            border: 3px solid #ff6699;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border: 2px solid #00ccff;
        }
        
        th {
            background-color: #ff9900;
            color: #000080;
            font-weight: bold;
        }
        
        tr:nth-child(even) {
            background-color: #ffccff;
        }
        
        tr:hover {
            background-color: #ccffff;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            font-size: 1.2em;
            color: #ff3399;
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        
        .action-button {
            background: linear-gradient(to bottom, #33ccff, #0099cc);
            color: white;
            border: 3px solid #000080;
            padding: 8px 15px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 8px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            box-shadow: 5px 5px 0 #000080;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        
        .action-button:hover {
            transform: scale(1.05);
            box-shadow: 3px 3px 0 #000080;
        }
        
        .counter {
            background-color: #ffff99;
            border: 2px dashed #ff6600;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
        }
        
        /* Marquee styling */
        .marquee {
            background-color: #00ffcc;
            color: #ff00ff;
            padding: 10px;
            font-weight: bold;
            border: 2px solid #9900cc;
            margin-bottom: 20px;
            overflow: hidden;
            white-space: nowrap;
        }
        
        .marquee span {
            display: inline-block;
            animation: marquee 15s linear infinite;
        }
        
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
    </style>
</head>
<body>
    <!-- 90s Decorative Elements -->
    <div class="decoration" style="top: 10%; left: 5%;">⭐</div>
    <div class="decoration" style="top: 20%; left: 90%;">🌈</div>
    <div class="decoration" style="top: 80%; left: 15%;">💾</div>
    <div class="decoration" style="top: 70%; left: 80%;">📼</div>
    <div class="decoration" style="top: 40%; left: 10%;">🎮</div>
    <div class="decoration" style="top: 30%; left: 85%;">📱</div>
    
    <div class="container">
        <h1><span class="blink">★</span> DATA SISWA TERDAFTAR <span class="blink">★</span></h1>
        
        <div class="marquee">
            <span>Selamat datang di halaman data siswa terdaftar! Sistem pendaftaran siswa baru tahun ajaran 2025/2026. Admin: <?php echo htmlspecialchars('Yaoimng'); ?></span>
        </div>
        
        <div class="action-buttons">
            <a href="index.php" class="action-button">Kembali ke Form Pendaftaran</a>
            <a href="list_students.php" class="action-button">Refresh Data</a>
        </div>
        
        <?php
        // Count total students
        $count = mysqli_num_rows($result);
        ?>
        <div class="counter">Jumlah siswa terdaftar: <span><?php echo $count; ?></span></div>
        
        <?php if ($count > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Agama</th>
                        <th>Sekolah Asal</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)): 
                        // Format the date
                        $tanggal_daftar = new DateTime($row['tanggal_daftar']);
                        $formatted_date = $tanggal_daftar->format('d-m-Y H:i:s');
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($row['jenis_kelamin']); ?></td>
                        <td><?php echo htmlspecialchars($row['agama']); ?></td>
                        <td><?php echo htmlspecialchars($row['sekolah_asal']); ?></td>
                        <td><?php echo $formatted_date; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-data">
                <p>Belum ada data siswa yang terdaftar</p>
                <p>Silakan lakukan pendaftaran melalui form pendaftaran</p>
            </div>
        <?php endif; ?>
    </div>
    
    <script>
        // Add some random stars for 90s effect
        for (let i = 0; i < 20; i++) {
            const star = document.createElement('div');
            star.classList.add('stars');
            star.style.left = `${Math.random() * 100}%`;
            star.style.top = `${Math.random() * 100}%`;
            document.body.appendChild(star);
        }
        
        // Current date and time in footer
        const updateDateTime = () => {
            const now = new Date();
            const dateTimeStr = now.toLocaleString('id-ID');
            document.getElementById('current-time').textContent = dateTimeStr;
        };
        
        // Update time every second
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>
</html>