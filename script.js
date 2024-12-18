'use strict';


document.addEventListener("DOMContentLoaded", () => {
/**
 * navbar toggle
 */

const overlay = document.querySelector("[data-overlay]");
const navOpenBtn = document.querySelector("[data-nav-open-btn]");
const navbar = document.querySelector("[data-navbar]");
const navCloseBtn = document.querySelector("[data-nav-close-btn]");

const navElems = [overlay, navOpenBtn, navCloseBtn];

for (let i = 0; i < navElems.length; i++) {
  navElems[i].addEventListener("click", function () {
    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
  });
}



/**
 * header & go top btn active on page scroll
 */

const header = document.querySelector("[data-header]");
const goTopBtn = document.querySelector("[data-go-top]");

window.addEventListener("scroll", function () {
  if (window.scrollY >= 80) {
    header.classList.add("active");
    goTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    goTopBtn.classList.remove("active");
  }
});


  // Pilih semua tombol filter
  const filterButtons = document.querySelectorAll('.filter-btn');
  const productItems = document.querySelectorAll('.product-item');

  // Fungsi untuk melakukan filtering
  function filterProducts(category) {
    productItems.forEach(item => {
      // Jika kategori "All" dipilih atau produk sesuai dengan kategori
      if (category === 'All' || item.getAttribute('data-category') === category) {
        item.style.display = 'block'; // Tampilkan produk
      } else {
        item.style.display = 'none'; // Sembunyikan produk
      }
    });
  }

  // Tambahkan event listener pada setiap tombol
  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Hapus kelas "active" dari semua tombol
      filterButtons.forEach(btn => btn.classList.remove('active'));
      // Tambahkan kelas "active" pada tombol yang diklik
      button.classList.add('active');

      // Ambil kategori dari ID tombol yang diklik
      const category = button.id.replace('filter-', ''); // Menghapus 'filter-' dari ID
      filterProducts(category.charAt(0).toUpperCase() + category.slice(1)); // Kapitalisasi
    });
  });

  // Tampilkan semua produk saat halaman pertama kali dimuat
  filterProducts('All');

// Seleksi elemen
const testimonialsList = document.querySelector('.testimonials-list');

// Fungsi untuk mengatur scroll berdasarkan lebar layar
function updateScrollBehavior() {
  if (window.innerWidth <= 768) {
    testimonialsList.style.overflowX = 'auto'; // Aktifkan scroll horizontal
  } else {
    testimonialsList.style.overflowX = 'hidden'; // Nonaktifkan scroll di desktop
  }
}

// Jalankan fungsi saat halaman dimuat
updateScrollBehavior();

// Jalankan fungsi setiap kali ukuran layar berubah
window.addEventListener('resize', updateScrollBehavior);


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetElement = document.querySelector(this.getAttribute('href'));
      window.scrollTo({
          top: targetElement.offsetTop,
          behavior: 'smooth'
      });
  });
});


// Slider otomatis
let index = 0;
const slides = document.querySelectorAll('.slide');

function showSlides() {
  slides.forEach((slide, i) => {
    slide.style.transform = `translateX(-${index * 100}%)`;
  });
  index = (index + 1) % slides.length;
}

setInterval(showSlides, 3000); // Ganti gambar setiap 3 detik


// Data produk
let favoritProduk = [];
let keranjangProduk = [];

// Fungsi untuk membuka dan menutup modal
function toggleModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal.style.display === "block") {
      modal.style.display = "none";
  } else {
      modal.style.display = "block";
  }
}

// Menutup modal ketika klik di luar modal
window.addEventListener("click", (event) => {
    const modal1 = document.getElementById("modal1");
    const modal2 = document.getElementById("modal2");
    // Cek jika klik di luar modal, maka tutup modal
    if (event.target === modal1) {
        modal1.style.display = "none";
    } else if (event.target === modal2) {
        modal2.style.display = "none";
    }
});

// Menambahkan event listener ke tombol close modal
document.querySelectorAll('.close-modal').forEach((button) => {
    button.addEventListener("click", () => {
        const modal1 = document.getElementById("modal1");
        const modal2 = document.getElementById("modal2");
        modal1.style.display = "none";
        modal2.style.display = "none";
    });
});

// Event listener untuk menambahkan produk ke Favorit
document.querySelectorAll(".btn-add-favorit").forEach((button, index) => {
  button.addEventListener("click", () => {
      const product = produkData[index]; // Ambil objek produk lengkap
      if (!favoritProduk.includes(product)) {
          favoritProduk.push(product); // Menyimpan objek produk lengkap
          button.classList.add("added"); // Tambahkan kelas "added"
      } else {
          favoritProduk = favoritProduk.filter(p => p !== product);
          button.classList.remove("added"); // Hapus kelas "added"
      }
      updateFavoritModal();
      document.getElementById("favorit-count").textContent = favoritProduk.length;
  });
});

// Event listener untuk menambahkan produk ke Keranjang
document.querySelectorAll(".btn-add-keranjang").forEach((button, index) => {
  button.addEventListener("click", () => {
      const product = produkData[index]; // Ambil objek produk lengkap
      if (!keranjangProduk.includes(product)) {
          keranjangProduk.push(product); // Menyimpan objek produk lengkap
          button.classList.add("added"); // Tambahkan kelas "added"
      } else {
          keranjangProduk = keranjangProduk.filter(p => p !== product);
          button.classList.remove("added"); // Hapus kelas "added"
      }
      updateKeranjangModal();
      document.getElementById("keranjang-count").textContent = keranjangProduk.length;
  });
});


// Fungsi untuk memperbarui daftar pada modal Favorit
function updateFavoritModal() {
  const favoritList = document.getElementById("favorit-list");
  favoritList.innerHTML = ""; // Kosongkan daftar sebelumnya

  favoritProduk.forEach(product => {
      const li = document.createElement("li");
      li.style.display = "flex";
      li.style.justifyContent = "space-between";
      li.style.alignItems = "center";
      li.style.padding = "10px 0";
      li.style.borderBottom = "1px solid #ccc";

      // Tambahkan nama produk
      const productName = document.createElement("span");
      productName.textContent = product;
      li.appendChild(productName);

      // Tambahkan tombol untuk melihat produk
      const viewButton = document.createElement("button");
      viewButton.textContent = "Lihat Produk";
      viewButton.className = "view-product-btn";
      viewButton.style.backgroundColor = "#4CAF50";
      viewButton.style.color = "white";
      viewButton.style.border = "none";
      viewButton.style.borderRadius = "5px";
      viewButton.style.padding = "5px 10px";
      viewButton.style.cursor = "pointer";

      // Event klik untuk mengarahkan ke halaman produk
      li.appendChild(viewButton);

      favoritList.appendChild(li);
  });
}

// Fungsi untuk memperbarui daftar pada modal Keranjang
function updateKeranjangModal() {
  const keranjangList = document.getElementById("keranjang-list");
  keranjangList.innerHTML = ""; // Kosongkan daftar sebelumnya

  keranjangProduk.forEach(product => {
      const li = document.createElement("li");
      li.style.display = "flex";
      li.style.justifyContent = "space-between";
      li.style.alignItems = "center";
      li.style.padding = "10px 0";
      li.style.borderBottom = "1px solid #ccc";

      // Tambahkan nama produk
      const productName = document.createElement("span");
      productName.textContent = product;
      li.appendChild(productName);

      // Tambahkan tombol untuk melihat produk
      const viewButton = document.createElement("button");
      viewButton.textContent = "Lihat Produk";
      viewButton.className = "view-product-btn";
      viewButton.style.backgroundColor = "#4CAF50";
      viewButton.style.color = "white";
      viewButton.style.border = "none";
      viewButton.style.borderRadius = "5px";
      viewButton.style.padding = "5px 10px";
      viewButton.style.cursor = "pointer";

      // Event klik untuk mengarahkan ke halaman produk
      li.appendChild(viewButton);

      keranjangList.appendChild(li);
  });
}

// Tambahkan event listener ke tombol Favorit di navbar
document.getElementById("btn-favorit").addEventListener("click", () => {
  toggleModal("modal1");  // Ubah dari 'favorit-modal' menjadi 'modal1'
  updateFavoritModal();
});

// Tambahkan event listener ke tombol Keranjang di navbar
document.getElementById("btn-keranjang").addEventListener("click", () => {
  toggleModal("modal2");  // Ubah dari 'keranjang-modal' menjadi 'modal2'
  updateKeranjangModal();
});

// Event listener untuk menambahkan produk ke Favorit
document.querySelectorAll(".btn-add-favorit").forEach((button, index) => {
  button.addEventListener("click", () => {
      const productName = document.querySelectorAll(".card-title")[index].innerText;

      if (!favoritProduk.includes(productName)) {
          favoritProduk.push(productName);
          button.classList.add("added"); // Tambahkan kelas "added"
      } else {
          favoritProduk = favoritProduk.filter(product => product !== productName);
          button.classList.remove("added"); // Hapus kelas "added"
      }

      updateFavoritModal();
      document.getElementById("favorit-count").textContent = favoritProduk.length;
  });
});

// Event listener untuk menambahkan produk ke Keranjang
document.querySelectorAll(".btn-add-keranjang").forEach((button, index) => {
  button.addEventListener("click", () => {
      const productName = document.querySelectorAll(".card-title")[index].innerText;

      if (!keranjangProduk.includes(productName)) {
          keranjangProduk.push(productName);
          button.classList.add("added"); // Tambahkan kelas "added"
      } else {
          keranjangProduk = keranjangProduk.filter(product => product !== productName);
          button.classList.remove("added"); // Hapus kelas "added"
      }

      updateKeranjangModal();
      document.getElementById("keranjang-count").textContent = keranjangProduk.length;
  });
});


// Ambil elemen yang diperlukan
const searchBtn = document.getElementById("search-btn");
const searchContainer = document.querySelector(".search-container");
const searchCloseBtn = document.getElementById("search-close-btn");
const searchInput = document.getElementById("search-input");

// Menampilkan input pencarian saat tombol pencarian diklik
searchBtn.addEventListener("click", function() {
    searchContainer.style.display = "flex"; // Menampilkan input pencarian
    searchInput.focus(); // Fokuskan input pencarian
});

// Menutup input pencarian saat tombol close diklik
searchCloseBtn.addEventListener("click", function() {
    searchContainer.style.display = "none"; // Menyembunyikan input pencarian
});

// Menambahkan event listener untuk pencarian
searchInput.addEventListener("input", function() {
    let query = searchInput.value.toLowerCase();
    let products = document.querySelectorAll(".product-item"); // Mengambil semua produk

    // Menyaring produk berdasarkan nama
    products.forEach(product => {
        let productName = product.querySelector(".product-card .product-name").textContent.toLowerCase();
        
        if (productName.includes(query)) {
            product.style.display = "block"; // Menampilkan produk yang cocok
        } else {
            product.style.display = "none"; // Menyembunyikan produk yang tidak cocok
        }
    });
});


});







