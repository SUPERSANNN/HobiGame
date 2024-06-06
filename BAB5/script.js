let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

// Mengambil elemen-elemen yang diperlukan
const openPopupBtn = document.querySelectorAll('.gallery-item');
const popupForm = document.getElementById('popupForm');
const closePopupBtn = document.getElementById('closePopupBtn');
const myForm = document.getElementById('myForm');
const processingPopup = document.getElementById('processingPopup');

function openPopup() {
    popupForm.style.display = 'flex';
}

function closePopup() {
    popupForm.style.display = 'none';
}

function openProcessingPopup() {
  processingPopup.style.display = 'flex';
}

function closeProcessingPopup() {
  processingPopup.style.display = 'none';
}

// Event listener untuk membuka pop-up form
openPopupBtn.forEach((openPopupBtn) =>{
  openPopupBtn.addEventListener('click', openPopup);
});

// Event listener untuk menutup pop-up form
closePopupBtn.addEventListener('click', closePopup);

// Menutup pop-up form ketika pengguna mengklik di luar konten form
window.addEventListener('click', function(event) {
    if (event.target === popupForm) {
        closePopup();
    }
});

// Event listener untuk menangani pengiriman formulir
function generateFormID() {
  // Menggunakan timestamp untuk menghasilkan ID unik
  return `form_${Date.now()}`;
}

// Event listener untuk menangani pengiriman formulir
myForm.addEventListener('submit', function(event) {
  event.preventDefault(); // Menghentikan pengiriman formulir secara default

  // Membuka pop-up transaksi
  openProcessingPopup();

  // Mendapatkan data formulir
  const id = document.getElementById('id').value;
  const server = document.getElementById('server').value;
  const topup = document.getElementById('topup').value;
  const metode = document.getElementById('metode').value;
  // Menghasilkan ID form unik
  const formID = generateFormID();

  // Data yang akan disimpan ke local storage
  const formData = {
      reg: formID, // Menambahkan ID form
      id,
      server,
      topup,
      metode,
      status: 'pending' // Menambahkan status 'pending'
  };

  // Menyimpan data ke local storage
  localStorage.setItem(formID, JSON.stringify(formData));

  // Tutup pop-up transaksi setelah beberapa waktu (simulasi pemrosesan)
  setTimeout(() => {
      closeProcessingPopup();
      alert(`Formulir ID ${formID} berhasil dikirim!`);
      // Bersihkan form setelah dikirim
      myForm.reset();
      // Tutup pop-up form
      closePopup();
  }, 3000);
});
