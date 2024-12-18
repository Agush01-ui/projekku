<?php
// product.php

session_start();

// Simulasi produk
$product = [
    'name' => 'Vans Authentic',
    'price' => 17000000,
    'rating' => 4.2,
    'reviews' => 443,
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

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }
        
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 500px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .modal-content {
            background-color:   black;
            margin: 10% auto;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .modal-header {
            background: black;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .close {
            float: right;
            font-size: 18px;
            cursor: pointer;
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
    
           
    
        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .modal-content {
            background-color:   black;
            margin: 10% auto;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
        .modal-header {
            margin-bottom: 5px;
            background:rgb(0, 255, 145) ;
            color: #fff;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .close {
            float: right;
            font-size: 18px;
            cursor: pointer;
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
        @media (max-width: 480px) {
            .product-title {
                font-size: 20px;
            }
    
            .price {
                font-size: 18px;
            }
    
            .size-button {
                flex: 1 1 30%;
                font-size: 12px;
            }
    
            .buy-button,
            .add-to-cart-button {
                font-size: 14px;
                padding: 8px;
            }
        }
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Product Image -->
        <div class="image">
            <img src="pr14.png" alt="Product Image" style="width: 100%; height: auto;">
        </div>
        <a href="../index.php" style="position: fixed; top: 10px; left: 10px; text-decoration: none; background: rgb(0, 255, 145); color: white; padding: 10px 15px; border-radius: 5px; font-size: 14px;">&#8592; Kembali</a>

        <!-- Product Details -->
        <div class="details">
            <h1 class="product-title"  style="color: black; font-size: 30px" >Vans Authentic</h1>
            <p class="rating"  style="color: black">⭐ 4.2 | <span  style="color: black">443 Reviews</span></p>
            <p class="price"  style="color: black">Rp<span id="price"  style="color: black">17.000.000</span></p>

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
            <p style="color: red; font-size: 20px">Total Harga: Rp<span id="total-price">17.000.000</span></p>

            <!-- Buttons -->
            <button class="buy-button" id="buy-now">Beli Sekarang</button>
            <button class="buy-button" style="background-color:  rgb(0, 255, 145);">Masukkan Keranjang</button>

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
            
            <div id="paymentModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Detail Pembayaran</h2>
                    </div>
                    <form id="payment-form">
                        <label for="name" style="color: white">Nama:</label>
                        <input type="text" id="name" placeholder="Masukkan nama Anda" required>
                        <label for="payment-method" style="color: white">Metode Pembayaran:</label>
                        <select id="payment-method">
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BSI">BSI</option>
                        </select>
                        <label for="card-number"  style="color: white">Nomor Kartu:</label>
                        <input type="text" id="card-number" maxlength="16" required>
                        <label for="cvv"  style="color: white">CVV:</label>
                        <input type="text" id="cvv" maxlength="3" required>
                        <h3  style="color: white">Pesanan Anda</h3>
                        <p  style="color: white">Size: <span id="modal-size"></span></p>
                        <p  style="color: white">Quantity: <span id="modal-quantity"></span></p>
                        <p  style="color: white">Total Harga: Rp <span id="modal-total-price"></span></p>
                        <button type="submit" class="confirm-payment" >Konfirmasi Pembayaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <script>
        // Base price
        const basePrice = 17000000;

        // Selectors
        const quantityInput = document.getElementById("quantity");
        const totalPriceElement = document.getElementById("total-price");
        const sizeButtons = document.querySelectorAll(".size-button");

        // Update total price
        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value) || 1;
            const totalPrice = basePrice * quantity;
            totalPriceElement.textContent = totalPrice.toLocaleString("id-ID");
        }

        // Quantity input listener
        quantityInput.addEventListener("input", updateTotalPrice);

        // Size button listener
        sizeButtons.forEach((button) => {
            button.addEventListener("click", () => {
                sizeButtons.forEach((btn) => btn.classList.remove("selected"));
                button.classList.add("selected");
            });
        });

        const commentsList = document.getElementById("comments-list");
        const commentText = document.getElementById("comment-text");
        const submitComment = document.getElementById("submit-comment");
        const stars = document.querySelectorAll(".star");

        let selectedRating = 0;

        // Fungsi untuk memilih rating
        stars.forEach(star => {
            star.addEventListener("click", () => {
                selectedRating = parseInt(star.getAttribute("data-value"));
                updateStarRating(selectedRating);
            });
        });

        function updateStarRating(rating) {
            stars.forEach(star => {
                star.classList.toggle("selected", parseInt(star.getAttribute("data-value")) <= rating);
            });
        }

        // Fungsi untuk menambahkan komentar
        submitComment.addEventListener("click", () => {
            const text = commentText.value.trim();

            if (text === "" || selectedRating === 0) {
                alert("Harap isi komentar dan pilih bintang.");
                return;
            }

            const comment = document.createElement("div");
            comment.className = "comment";

            const starsDiv = document.createElement("div");
            starsDiv.className = "stars";
            starsDiv.textContent = "⭐".repeat(selectedRating);

            const textDiv = document.createElement("div");
            textDiv.className = "text";
            textDiv.textContent = text;

            comment.appendChild(starsDiv);
            comment.appendChild(textDiv);
            commentsList.prepend(comment);

            // Reset form
            commentText.value = "";
            selectedRating = 0;
            updateStarRating(0);
        });

       
        const modalSize = document.getElementById('modal-size');
        const modalQuantity = document.getElementById('modal-quantity');
        const modalTotalPrice = document.getElementById('modal-total-price');
        const buyButton = document.getElementById('buy-now');
        const modal = document.getElementById('paymentModal');
        const closeModal = document.querySelector('.close');
        let selectedSize = null;
        sizeButtons.forEach(button => {
            button.addEventListener('click', () => {
                sizeButtons.forEach(btn => btn.classList.remove('selected'));
                button.classList.add('selected');
                selectedSize = button.dataset.size;
            });
        });
        quantityInput.addEventListener('input', () => {
            const quantity = parseInt(quantityInput.value) || 1;
            const price = 17000000;
            totalPriceElement.textContent = (quantity * price).toLocaleString();
        });
        buyButton.addEventListener('click', () => {
            if (!selectedSize) {
                alert('Pilih ukuran terlebih dahulu!');
                return;
            }
            modalSize.textContent = selectedSize;
            modalQuantity.textContent = quantityInput.value;
            modalTotalPrice.textContent = totalPriceElement.textContent;
            modal.style.display = 'block';
        });
        closeModal.addEventListener('click', () => {
            modal.style.display = 'none';
        });
        document.getElementById('payment-form').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Pembayaran berhasil dikonfirmasi!');
            modal.style.display = 'none';
        });
        document.getElementById('submit-comment').addEventListener('click', () => {
            const commentInput = document.getElementById('comment-input');
            const commentsList = document.getElementById('comments-list');
            if (commentInput.value.trim() !== '') {
                const li = document.createElement('li');
                li.textContent = commentInput.value;
                commentsList.appendChild(li);
                commentInput.value = '';
            }
        });

    </script>
</body>
</html>
        