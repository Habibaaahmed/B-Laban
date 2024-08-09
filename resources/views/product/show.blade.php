<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    display: none;
}

.confirmation-popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    z-index: 1001;
    display: none;
}

.confirmation-message {
    font-size: 18px;
    margin-bottom: 20px;
}

#close-popup {
    background-color: #48a9e6;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

#close-popup:hover {
    background-color: #39a1db;
}

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .product-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-image img {
            width: 300px;
            height: 300px;
            border-radius: 10px;
        }
        .product-details {
            text-align: center;
        }
        .product-details .name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .product-details .description {
            font-size: 16px;
            margin-bottom: 10px;
            color: #666;
        }
        .product-details .price {
            font-size: 20px;
            color: #555;
            margin-bottom: 20px;
        }
        .add-to-cart {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .quantity {
            margin-right: 10px;
            font-size: 18px;
        }
        .add-to-cart input[type="number"] {
            width: 50px;
            padding: 5px;
            font-size: 16px;
            text-align: center;
            margin-right: 10px;
        }
        .add-to-cart button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #48a9e6;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .reviews {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .reviews .review {
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }
        .reviews .review .rating {
            color: #f4b400;
            font-weight: bold;
        }
        .reviews .review .comment {
            margin-top: 5px;
            font-size: 16px;
            color: #555;
        }
        .reviews .review .user {
            margin-top: 5px;
            font-size: 14px;
            color: #888;
        }
        .review-form {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .review-form h3 {
            margin-bottom: 20px;
            color: #000;
            font-size: 24px;
            font-weight: bold;
        }
        .review-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .review-form textarea,
        .review-form select,
        .review-form input[type="number"],
        .review-form input[type="submit"] {
            /* width: 100%; */
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .review-form textarea {
            height: 100px;
            width: 98%;
            resize: vertical;
        }
        .review-form input[type="submit"] {
            background-color: #48a9e6;
            color: #fff;
            border: none;
            cursor: pointer;

        }
        .review-form input[type="submit"]:hover {
            background-color: #39a1db;
        }
    </style>
</head>
<body>
<x-navbar />
    <div class="container">
        <div class="product-image">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-details">
            <div class="name">{{ $product->name }}</div>
            <div class="description">{{ $product->description }}</div>
            <div class="price">$ {{ number_format($product->price, 2) }}</div>
        </div>
        <div class="add-to-cart">
            <input type="number" name="quantity" value="1" min="1">
            <button type="button">Add to Cart</button>
        </div>
        <div class="reviews">
            <h3>Reviews</h3>
            @foreach($product->reviews as $review)
                <div class="review">
                    <div class="rating">Rating: {{ $review->rating }} ★</div>
                    <div class="comment">{{ $review->comment }}</div>
                    <div class="user">Reviewed by: {{ $review->user->name }}</div>
                </div>
            @endforeach
        </div>
        @auth
        <div class="review-form">
            <h3>Write a Review</h3>
            <form action="{{ route('product.review.store', $product->id) }}" method="POST">
                @csrf
                <div>
                    <label for="rating">Rating:</label>
                    <input type="number" id="rating" name="rating" min="1" max="5" required>
                </div>
                <div>
                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" rows="4" required></textarea>
                </div>
                <input type="submit" value="Submit Review">
            </form>
        </div>
        @else
        <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
        @endauth
    </div>
    <div id="overlay" class="overlay hidden"></div>
<div id="confirmation-popup" class="confirmation-popup hidden">
    <p class="confirmation-message">Product added to cart!</p>
    <button type="button" id="close-popup">Close</button>
</div>

    <x-footer />
    <script>
  document.querySelector('.add-to-cart button').addEventListener('click', function() {
    const productId = "{{ $product->id }}";
    const quantity = document.querySelector('.add-to-cart input[name="quantity"]').value;

    fetch("{{ route('cart.add') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            product_id: productId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showConfirmationPopup();
        } 
    })
    .catch(error => console.error('Error:', error));
});

function showConfirmationPopup() {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('confirmation-popup').style.display = 'block';
}

document.getElementById('close-popup').addEventListener('click', function() {
    document.getElementById('confirmation-popup').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
});

</script>

</body>
</html>