<?php
// product.php

session_start();

// Simulasi produk
$product = [
    'name' => 'Nike Vapor',
    'price' => 12200000,
    'rating' => 4.2,
    'reviews' => 143,
];


// Menangani komentar
$comments = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment'], $_POST['rating'])) {
        $comment = htmlspecialchars($_POST['comment']);
        $rating = (int)$_POST['rating'];

        // Tambahkan komentar ke sesi (simulasi penyimpanan sementara)
        $comments[] = [
            'text' => $comment,
            'rating' => $rating,
        ];

        $_SESSION['comments'][] = [
            'text' => $comment,
            'rating' => $rating,
        ];
    }
}

// Ambil komentar dari sesi
if (isset($_SESSION['comments'])) {
    $comments = $_SESSION['comments'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }
        .container {
            width: 100%;
            height: 100%;
            margin: 20px auto;
            display: flex;
            gap: 20px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .image {
            flex: 1;
            max-width: 500px;
            padding: 20px;
        }
        .details {
            flex: 2;
            padding: 20px;
        }
        .product-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }
        .rating {
            color: #666;
            font-size: 16px;
            margin: 10px 0;
        }
        .price {
            font-size: 24px;
            color: #ff5722;
            margin: 15px 0;
        }
        .quantity-section {
            margin: 20px 0;
        }
        #quantity {
            width: 60px;
            text-align: center;
            font-size: 16px;
            margin-left: 10px;
            padding: 5px;
        }
        .size-selector {
            margin: 20px 0;
        }
        .size-button {
            padding: 10px 15px;
            margin-right: 10px;

            background-color:  black ;
            cursor: pointer;
            transition: 0.3s;
            color: white;
        }
        .size-button:hover,
        .size-button.selected {
       
            background-color:    rgb(0, 255, 145);
            color: #fff;
        }
        .buy-button {
            margin-top: 20px;
            padding: 15px 30px;
            font-size: 18px;
            color: #fff;
            background-color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .buy-button:hover {
            border-radius: 5px;
            background-color: black  ;
        }

         /* Komentar */
         .comments-section {
            margin-top: 10px;
            border-top: 2px solid #ddd;
            padding-top: 20px;
            color: black;
            width: 100px;
        }

        .comment-form {
            margin-bottom: 20px;
        }

        .comment-form textarea {
            width: 900%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid black;
            border-radius: 5px;
            resize: none;
        }

        .comment-form .submit-comment {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color:black ;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 920%;
        }

        .comment-form .submit-comment:hover {
            background-color:  rgb(0, 255, 145)  ;
        }

        .comment {
            margin-bottom: 15px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .comment .stars {
            color: #ffcc00;
            height: 100px;
            width: 100px;
        }

        .comment .text {
            font-size: 17px;
            color: blac;
        }

        .star-rating {
            display: flex;
            margin-bottom: 10px;
        }

        .star-rating .star {
            font-size: 20px;
            color: #ddd;
            cursor: pointer;
            transition: 0.3s;
        }

        .star-rating .star.selected {
            color: #ffcc00;
        }

      

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .confirm-payment {
            background: #e63946;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
                width: 95%;
                margin: 20px auto;
            }
    
            .image img {
                width: 80%;
                margin-bottom: 20px;
            }
    
            .details {
                width: 100%;
                text-align: center;
            }
    
            .size-selector {
                display: flex;
                justify-content: center;
                flex-wrap: wrap;
            }
    
            .size-button {
                flex: 1 1 20%;
                margin: 5px;
                font-size: 14px;
            }
    
            .quantity-section input {
                width: 100%;
                text-align: center;
            }
    
            .buttons {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }
    
            .buy-button,
            .add-to-cart-button {
                width: 80%;
                margin: 0;
            }
    
            .comment-section {
                width: 95%;
            }
    
            .comment-section textarea {
                width: 100%;
            }
    
            .comments-section {
                margin-top: 10px;
                border-top: 2px solid #ddd;
                padding-top: 20px;
                color: white;
                width: 100px;
            }
    
            .comment-form {
                margin-bottom: 20px;
                width: 100%;
            }
    
            .comment-form textarea {
                width: 600%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid white;
                border-radius: 5px;
                resize: none;
            }
    
            .comment-form .submit-comment {
                padding: 10px 20px;
                font-size: 16px;
                color: #fff;
                background-color:blue ;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 620%;
            }
    
            .comment-form .submit-comment:hover {
                background-color:   #1B1A35;
            }
    
            .comment {
                margin-bottom: 15px;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }
    
            .comment .stars {
                color: #ffcc00;
                margin-bottom: 5px;
                height: 100px;
                width: 100px;
            }
    
            .comment .text {
                font-size: 17px;
                color: white;
            }
    
            .star-rating {
                display: flex;
                margin-bottom: 10px;
            }
    
            .star-rating .star {
                font-size: 20px;
                color: #ddd;
                cursor: pointer;
                transition: 0.3s;
            }
    
           
        }
    </style>
</head>
<body>
<div class="container">
        <!-- Product Image -->
        <div class="image">
            <img src="pr4.png" alt="Product Image" style="width: 100%; height: auto;">
        </div>
        <a href="../index.php" style="position: fixed; top: 10px; left: 10px; text-decoration: none; background: rgb(0, 255, 145); color: white; padding: 10px 15px; border-radius: 5px; font-size: 14px;">&#8592; Kembali</a>

        <!-- Product Details -->
        <div class="details">
            <h1 class="product-title" style="color: black; font-size: 30px">Nike Vapor</h1>
            <p class="rating" style="color: black">⭐ 4.2 | <span style="color: black">143 Reviews</span></p>
            <p class="price" style="color: black">Rp<span id="price" style="color: black">12.200.000</span></p>

            <!-- Size Selector -->
            <div class="size-selector">
                <p style="color: black">Pilih Ukuran:</p>
                <button class="size-button" data-size="36">36</button>
                <button class="size-button" data-size="37">37</button>
                <button class="size-button" data-size="38">38</button>
                <button class="size-button" data-size="39">39</button>
                <button class="size-button" data-size="40">40</button>
                <button class="size-button" data-size="41">41</button>
            </div>

            <!-- Quantity -->
            <div class="quantity-section">
                <label for="quantity" style="color: black">Kuantitas:</label>
                <input type="number" id="quantity" min="1" value="1">
            </div>
            <p style="color: red; font-size: 20px">Total Harga: Rp<span id="total-price">12.200.000</span></p>

            <!-- Buttons -->
            <button class="buy-button" id="buy-now">Beli Sekarang</button>
            <button class="buy-button" style="background-color: rgb(0, 255, 145);">Masukkan Keranjang</button>

            <!-- Comments Section -->
            <div class="comments-section">
                <h2>Komentar</h2>
                <div class="comment-form">
                    <div class="star-rating" id="star-rating">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                    </div>
                    <textarea id="comment-text" rows="3" placeholder="Tulis komentar Anda..."></textarea>
                    <button class="submit-comment" id="submit-comment">Kirim Komentar</button>
                </div>
                <div id="comments-list">
                    <!-- Komentar akan ditambahkan di sini -->
                </div>
            </div>
        </div>
    </div>
  <script>
    
    const price = 12200000; // Harga sepatu
const quantityInput = document.getElementById('quantity');
const totalPriceSpan = document.getElementById('total-price');
const buyNowButton = document.getElementById('buy-now');
const sizeButtons = document.querySelectorAll('.size-button');
let selectedSize = null;

// Data stok per ukuran sepatu
const stockData = {
    36: 2, 
    37: 0, 
    38: 10, 
    39: 3, 
    40: 0, 
    41: 7  
};

// Menghitung harga total
function updateTotalPrice() {
    const quantity = parseInt(quantityInput.value) || 1;
    const totalPrice = price * quantity;
    totalPriceSpan.textContent = totalPrice.toLocaleString('id-ID');
}

quantityInput.addEventListener('input', updateTotalPrice);

// Pilih ukuran
sizeButtons.forEach(button => {
    button.addEventListener('click', () => {
        const size = button.getAttribute('data-size');
        if (stockData[size] === 0) {
            // Jika stok ukuran habis, tampilkan pop-up
            showOutOfStockPopup(size);
        } else {
            sizeButtons.forEach(btn => btn.classList.remove('selected'));
            button.classList.add('selected');
            selectedSize = size;
        }
    });
});

// Menampilkan pop-up stok habis
function showOutOfStockPopup(size) {
    const modal = document.createElement('div');
    modal.innerHTML = `
        <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1000;">
            <div style="background: white; padding: 20px; border-radius: 10px; width: 400px; text-align: center;">
                <h2>Ukuran ${size} Tidak Tersedia</h2>
                <p>Stok untuk ukuran ${size} saat ini habis.</p>
                <button id="close-popup" style="background: #ccc; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Tutup</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);

    // Tombol tutup pop-up
    modal.querySelector('#close-popup').addEventListener('click', () => {
        modal.remove();
    });
}

// Buka modal untuk konfirmasi pembelian
buyNowButton.addEventListener('click', () => {
    if (!selectedSize) {
        alert('Silakan pilih ukuran terlebih dahulu.');
        return;
    }

    const modal = document.createElement('div');
    modal.innerHTML = `
        <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1000;">
            <div style="background: white; padding: 20px; border-radius: 10px; width: 400px; text-align: left;">
                <h2>Konfirmasi Pembayaran</h2>
                <label>Alamat Pengiriman:</label>
                <textarea id="address" style="width: 100%; height: 50px; margin-bottom: 10px;"></textarea>
                <label>Metode Pembayaran:</label>
                <select id="payment-method">
                    <option value="bca">BCA</option>
                    <option value="bri">BRI</option>
                    <option value="bsi">BSI</option>
                </select>
                <label>Opsi Pengiriman:</label>
                <select id="shipping-option">
                    <option value="5000">Reguler (Rp 5.000)</option>
                    <option value="10000">Express (Rp 10.000)</option>
                </select>
                <h3>Ringkasan Pesanan:</h3>
                <p>Harga Sepatu: Rp ${price.toLocaleString('id-ID')}</p>
                <p>Kuantitas: ${quantityInput.value}</p>
                <p>Ukuran: ${selectedSize}</p>
                <p>Biaya Layanan: Rp 2.000</p>
                <p id="shipping-fee">Opsi Pengiriman: Rp 5.000</p>
                <p id="final-total">Total: Rp ${(price * parseInt(quantityInput.value) + 5000 + 2000).toLocaleString('id-ID')}</p>
                <button id="confirm-payment" style="background: #e63946; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">Konfirmasi Pembayaran</button>
                <button id="close-modal" style="background: #ccc; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">Tutup</button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);

    const shippingOption = modal.querySelector('#shipping-option');
    const shippingFee = modal.querySelector('#shipping-fee');
    const finalTotal = modal.querySelector('#final-total');

    shippingOption.addEventListener('change', () => {
        const shippingCost = parseInt(shippingOption.value);
        shippingFee.textContent = `Opsi Pengiriman: Rp ${shippingCost.toLocaleString('id-ID')}`;
        finalTotal.textContent = `Total: Rp ${(price * parseInt(quantityInput.value) + shippingCost + 2000).toLocaleString('id-ID')}`;
    });

    modal.querySelector('#close-modal').addEventListener('click', () => {
        modal.remove();
    });

    modal.querySelector('#confirm-payment').addEventListener('click', () => {
        const paymentMethod = document.getElementById('payment-method').value;

        // Generate nomor virtual account berdasarkan bank yang dipilih
        const vaNumber = generateVANumber(paymentMethod);

        // Pop-up untuk nomor virtual account
        const vaModal = document.createElement('div');
        vaModal.innerHTML = `
            <div style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1000;">
                <div style="background: white; padding: 20px; border-radius: 10px; width: 400px; text-align: left;">
                    <h2>Virtual Account</h2>
                    <p>Nomor Virtual Account (${paymentMethod.toUpperCase()}): ${vaNumber}</p>
                    <button id="confirm-order" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">OK</button>
                    <button id="cancel-order" style="background: #dc3545; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Batalkan Pesanan</button>
                </div>
            </div>
        `;
        document.body.appendChild(vaModal);

        // Tombol OK untuk menyelesaikan pesanan
        vaModal.querySelector('#confirm-order').addEventListener('click', () => {
            alert('Pesanan berhasil dibuat');
            vaModal.remove();
        });

        // Tombol Batalkan Pesanan
        vaModal.querySelector('#cancel-order').addEventListener('click', () => {
            alert('Pesanan dibatalkan');
            vaModal.remove();
        });

        modal.remove();
    });
});

// Fungsi untuk menghasilkan nomor VA acak
function generateVANumber(bank) {
    let prefix;
    switch (bank) {
        case 'bca':
            prefix = '013'; // Prefix untuk BCA
            break;
        case 'bri':
            prefix = '002'; // Prefix untuk BRI
            break;
        case 'bsi':
            prefix = '451'; // Prefix untuk BSI
            break;
        default:
            prefix = '000'; // Default prefix jika tidak valid
    }

    const randomNumber = Math.floor(1000000000 + Math.random() * 9000000000); // Nomor acak 10 digit
    return `${prefix}${randomNumber}`;
}

</script>

</body>
</html>