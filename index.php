<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .view-data-button {
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
            margin-top: 20px;
        }
        
        .view-data-button:hover {
            transform: scale(1.05);
            box-shadow: 3px 3px 0 #000080;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
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
        <h1><span class="blink">★</span> FORMULIR PENDAFTARAN SISWA BARU <span class="blink">★</span></h1>
        
        <?php
        if (isset($_GET['message'])) {
            echo '<div class="message">' . htmlspecialchars($_GET['message']) . '</div>';
        }
        ?>
        
        <form action="process.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" rows="4" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="radio-group">
                    <div class="radio-option">
                        <input type="radio" id="laki" name="jenis_kelamin" value="Laki-laki" required>
                        <label for="laki">Laki-laki</label>
                    </div>
                    <div class="radio-option">
                        <input type="radio" id="perempuan" name="jenis_kelamin" value="Perempuan">
                        <label for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="agama">Agama:</label>
                <select id="agama" name="agama" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="sekolah_asal">Sekolah Asal:</label>
                <input type="text" id="sekolah_asal" name="sekolah_asal" required>
            </div>
            
            <button type="submit">DAFTAR SEKARANG!</button>
        </form>
        
        <div class="button-container">
            <a href="list_students.php" class="view-data-button">LIHAT DATA SISWA TERDAFTAR</a>
        </div>
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
    </script>
</body>
</html>