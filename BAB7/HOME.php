<?php
include 'koneksi.php';

// Ambil data dari tabel tb_item
$itemQuery = "SELECT id_item, nama_item FROM tb_item";
$itemResult = mysqli_query($koneksi, $itemQuery);
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo "
        <script>
            alert('Anda harus login terlebih dahulu');
            window.location = 'LOGIN.php';
        </script>
    ";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO MOBILE LEGENDS</title>
    <link rel="stylesheet" href="style.css">
    <style>
    body {
        font-family: Georgia, Times, 'Times New Roman', serif, sans-serif;
        margin: 10px;
        padding: 5px;
        background-color: #ffffff;
    }

    header {
        background-color: #d9ff00;
        color: #000000;
        padding: 20px 30px;
        text-align: center;
    }

    nav {
        background-color: #000000;
        padding: 10px;
        text-align: center;
    }

    nav a {
        color: #002fff;
        text-decoration: none;
        margin: 0 10px;
    }

    nav a:hover {
        color: #ff9900;
    }

    section {
        padding: 5px;
        text-align: center;
    }

    h2 {
        color: #000000;
    }

    p {
        color: #666;
    }

    .cta-button {
        display: inline-block;
        background-color: #004466;
        color: #fff;
        padding: 5px 10px;
        text-decoration: none;
        border-radius: 10px;
        margin-top: 25px;
    }

    .cta-button:hover {
        background-color: #ff9900;
    }

    footer {
        background-color: #00ffff;
        color: #fff;
        text-align: center;
        padding: 5px 0;
    }
    
    .slideshow-container {
        max-width: 1000px;
        position: center;
        margin: auto;
      }
      
      /* Hide the images by default */
      .mySlides {
        display: none;
      }
      
      /* Next & previous buttons */
      .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: blue;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }
      
      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 4px 0 0 4px;
      }
      
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover, .next:hover {
        background-color: rgba(0,0,0,0.8);
      }
      
      /* Caption text */
      .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }
      
      /* Number text (1/3 etc) */
      .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }
      
      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #000000;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
      }
      
      .active, .dot:hover {
        background-color: #717171;
      }
      
      /* Fading animation */
      .fade {
        animation-name: fade;
        animation-duration: 1.5s;
      }
      
      @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
      }

/* galeri */
.gallery {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    padding: 16px;
    justify-content: center;
}

.gallery-item {
    width: calc(10% - 3px); /* Tiga item per baris, kurangi jarak antar item */
    border: 1px solid #ddd;
    border-radius: 4px;
    overflow: hidden;
    position: relative;
}

.gallery-item :hover{
  cursor: pointer;
}
.gallery-item img {
    width: 100%;
    display: block;
}

.gallery-caption {
    position: absolute;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 8px 0px;
    width: 100%;
    text-align: center;
}
/* Mengatur gaya umum */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}
/* Gaya untuk pop-up */
.popup {
    display: none; /* Awalnya tersembunyi */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.popup-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 300px; /* Lebih kecil */
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 20px;
    color: #aaa;
}

.close-btn:hover {
    color: black;
}

/* Gaya untuk form */
.form-group{
  margin: 10px;
}
input,
select{
  width: 250px;
  padding: 10px;
}
form button {
    margin-top: 12px;
    padding: 8px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #0056b3;
}

      </style>
</head>
<body>
    <header>
        <h1>WE ARE MEMBERSHIP</h1>
    </header>
    <nav>
        
        <a href="HOME.html">BERANDA</a>
        <a href="bb3.html">DATA</a>
        <a href="Register.html">SETTING</a>
        <a href="REG.php">REGISTER</a>
    </ul>
    </nav>
    

<!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      < <center>
        <img src="ML.jpg" style="width: 50%;"> 
      </center>
      <div class="text">PLAYER ML</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <center>
        <img src="BTR.jpg" style="width: 50%;"> 
      </center>
      <div class="text">PLAYER PUBG</div>
    </div>
  
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <center>
        <img src="E.jpg" style="width: 50%;"> 
      </center>
      <div class="text">PLAYER E-FOOTBALL</div>
    </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>


    <section>
        <h2>Selamat Datang Semangat Kuliah </h2>
        <p>Lakukan Apa Yang Ingin Anda Lakukan </p>
        <p>Tentukan Hobi Kalian Dan Keluarkan Skill Kalian.</p>
        <p>SELAMAT BERMAIN</p>
        <a href="LOGIN.php" class="cta-button">LOGIN</a>
    </section>
    <section class="pilihan">
      <h1>Top Up</h1>
      <div class="gallery">
        <div class="gallery-item" id="openPopupBtn">
            <img src="emel.jpg" alt="Gambar 1">
            <div class="gallery-caption">MLBB</div>
        </div>
        <div class="gallery-item" id="openPopupBtn" style="background-color: #000;">
            <img src="ff-logo.jpg" alt="Gambar 2" >
            <div class="gallery-caption">Free Fire</div>
        </div>
        <div class="gallery-item" id="openPopupBtn">
            <img src="pubg.jpg" alt="Gambar 3">
            <div class="gallery-caption">PUBG</div>
        </div>
      </div>
    <!-- Pop-Up Form -->
    <div id="popupForm" class="popup">
      <div class="popup-content">
          <span id="closePopupBtn" class="close-btn">&times;</span>
          <h2>Form Top Up</h2>
          <form action="admin/penjualan-proses.php" method="post">
            <div class="form-group">
                <input type="number" id="game" name="game" placeholder="ID Game" required>
            </div>
            <div class="form-group">
                <input type="number" id="server" name="server" placeholder="ID Server" required>
            </div>
            <div class="form-group">
                <select id="topup" name="topup" style="text-align: center;" required>
                    <option value="">--- Pilih Jumlah Top Up ---</option>
                    <?php
                    while ($item = mysqli_fetch_assoc($itemResult)) {
                        echo "<option value='{$item['id_item']}'>{$item['nama_item']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <select id="metode" name="metode" style="text-align: center;" required>
                    <option value="">--- Pilih Metode Pembayaran ---</option>
                    <option value="Indomart">Indomart</option>
                    <option value="Alfamart">Alfamart</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                    <option value="Pulsa">Pulsa</option>
                </select>
            </div>
            <button type="submit" name="simpan">Kirim</button>
        </form>
      </div>
  </div>
    </section>
    <center>
        <img src="BADUTLONA.jpeg" width="20%" height="20%">
    </center>
    <footer>
        <p>HAK CIPTA &copy; 2024 SANDY EKA </p>
    </footer>    
    <script src="script.js"></script>
</body>
</html>
