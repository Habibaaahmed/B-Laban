<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Laban</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-bottom: 1px solid #ccc;
            padding: 10px 30px;
            height: 100px;
            position: relative;
        }
        .logo img {
            max-width: 140px;
            height: auto;
        }
        .nav-links {
            display: flex;
            align-items: center;
        }
        .nav-links a {
            text-decoration: none;
            color: #000;
            padding: 10px 15px;
            margin: 0 10px;
            position: relative;
            font-size: 18px;
        }
        .nav-links a:hover {
            color: #39A1DB;
        }
        .nav-icons {
            display: flex;
            align-items: center;
            position: relative;
        }
        .nav-icons img {
            width: 20px;
            height: auto;
            margin-left: 20px;
            cursor: pointer;
            position: relative;
        }
        .contact-btn {
            background-color: #48a9e6;
            color: #fff;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 25px;
            margin-left: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px; /* Ensure consistent font size */
            white-space: nowrap; /* Prevent text wrapping */
        }
        .contact-btn img {
            margin-left: 0px;
            margin-right: 10px;
            width: 17px;
        }
        .contact-btn:hover {
            background-color: #007acc;
        }
        #cart-count {
            position: absolute;
            top: 5px; 
            right: 10px; /* Adjust right position to fit the icon */
            background-color: #f00;
            color: #fff;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 16px;
            font-weight: bold;
            min-width: 20px; /* Ensure minimum width for visibility */
            height: 20px; /* Ensure height matches */
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="B laban">
        </div>
        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('home') }}#menu">Menu</a>
            <a href="{{ route('home') }}#services">Services</a>
        </div>
        <div class="nav-icons">
            <a href="{{ route('cart') }}"><img src="{{ asset('images/cart.png') }}" alt="Cart" ><span id="cart-count" style="position: absolute; top:5px; right: 98px; background-color: #f00; color: #fff; border-radius: 50%; padding: 4px 8px; font-size: 16px; font-weight: bold; min-width: 10px; height: 10px; display: flex; align-items: center; justify-content: center;"> </span>
</a>
<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const cartCountRoute = `{{ route('cart.count') }}`;

                    // Fetch and update cart count
                    function updateCartCount() {
                        fetch(cartCountRoute)
                            .then(response => response.json())
                            .then(data => {
                                document.getElementById('cart-count').textContent = data.count;
                            })
                            .catch(error => console.error('Error fetching cart count:', error));
                    }

                    updateCartCount();

                    // Listen for adding items to the cart
                    document.body.addEventListener('click', function(event) {
                        if (event.target.matches('.add-to-cart button')) {
                            const productId = event.target.dataset.productId;
                            const quantity = event.target.closest('.add-to-cart').querySelector('input[name="quantity"]').value;

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
                             
                                    // Update cart count and refresh
                                    updateCartCount();
                          
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    });
                });
            </script>
            <a href="{{ route('profile') }}" class="contact-btn">Profile</a>
        </div>
    </div>


</body>
</html>
