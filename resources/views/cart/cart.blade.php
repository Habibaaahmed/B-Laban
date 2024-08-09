<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=David+Libre:wght@700&display=swap" />
    <title>Cart</title>
    <style>
        /* Styles for the custom alert modal */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .modal-header, .modal-body, .modal-footer {
            padding: 10px;
        }

        .modal-header {
            border-bottom: 1px solid #ddd;
            font-size: 1.2em;
            font-weight: bold;
        }

        .modal-body {
            margin: 15px 0;
        }

        .modal-footer {
            text-align: right;
        }

        .modal-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .modal-button.cancel {
            background-color: #6c757d;
        }
    </style>
</head>
<body>
    <x-navbar />
    <div class="main">
        <div class="left-main">
            <!-- Cart Section -->
            <div class="cart-section">
                <b class="title">Cart</b>
                <p class="description">Check your cart items before proceeding to payment</p>
                <div class="order-container">
                    @php
                        $total = 0;
                        $cart = session()->get('cart', []);
                    @endphp

                    @foreach($cart as $productId => $item)
                        @php
                            $total += $item['price'] * $item['quantity'];
                        @endphp
                        <div class="order-box">
                            <div class="order-item">
                                <img class="item-photo" src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                                <div class="item-data">
                                    <div class="item-left">
                                        <b class="item-name">{{ $item['name'] }}</b>
                                        <b class="item-description">Quantity: {{ $item['quantity'] }}</b>
                                    </div>
                                    <div class="item-right">
                                        <b class="item-price">{{ number_format($item['price'] * $item['quantity'], 2) }} L.E</b>
                                        <img src="{{ asset('images/delete.png') }}" alt="Delete" class="delete-item" data-id="{{ $productId }}">
                                    </div>
                                </div>
                            </div>
            
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Payment Section -->
            <div class="payment-section">
                <b class="title">Payment methods</b>
                <div class="payment-box">
                    <label>
                        <img src="{{ asset('images/cash.png') }}" alt="Cash" />
                        Cash
                        <input type="radio" name="payment_method" value="cash">
                    </label>
                </div>
                <div class="payment-box">
                    <label>
                        <img src="{{ asset('images/visa.png') }}" alt="Visa" />
                        Visa Debit Card
                        <input type="radio" name="payment_method" value="visa">
                    </label>
                </div>
                <div class="payment-box">
                    <label>
                        <img src="{{ asset('images/mastercard.png') }}" alt="Mastercard" />
                        Mastercard
                        <input type="radio" name="payment_method" value="mastercard">
                    </label>
                </div>
            </div>
        </div>
        <!-- Order Summary -->
        <div class="order-summary">
            <b class="summary-title">Summary Order</b>
            <div class="summary-content">
                <div class="summary-item">
                    <div class="summary-label">
                        <b class="summary-name">Total:</b>
                    </div>
                    <div class="summary-value">
                        <b class="summary-amount" id="totalPrice">{{ number_format($total, 2) }} L.E</b>
                    </div>
                </div>
                <div class="summary-item">
                    <div class="summary-label">
                        <b class="summary-name">Shipping:</b>
                    </div>
                    <div class="summary-value">
                        <b class="summary-amount">15 L.E</b>
                    </div>
                </div>
                <hr class="summary-separator">
                <div class="summary-item">
                    <div class="summary-label">
                        <b class="summary-name">Total cost:</b>
                    </div>
                    <div class="summary-value">
                        <b class="summary-amount" id="totalCost">{{ number_format($total + 15, 2) }} L.E</b>
                    </div>
                </div>
                <button class="pay-button" id="payButton">Pay</button>
            </div>
        </div>
    </div>
    <x-footer />

    <!-- Custom Alert Modal -->
    <div id="alertModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                Payment
            </div>
            <div class="modal-body">
                Please select a payment method before proceeding.
            </div>
            <div class="modal-footer">
                <button class="modal-button" id="modalOkButton">OK</button>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Attach event listeners to delete buttons
        attachDeleteEventListeners();

        document.getElementById('payButton').addEventListener('click', function() {
            const paymentMethodSelected = document.querySelector('input[name="payment_method"]:checked');
            if (!paymentMethodSelected) {
                showAlert();
                return;
            }
            checkout(paymentMethodSelected.value);
        });

        document.getElementById('modalOkButton').addEventListener('click', function() {
            document.getElementById('alertModal').style.display = 'none';
        });
    });

    function attachDeleteEventListeners() {
        const deleteButtons = document.querySelectorAll('.delete-item');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                removeItemFromCart(productId);
            });
        });
    }

    function showAlert() {
        document.getElementById('alertModal').style.display = 'block';
    }

    const removeFromCartRoute = `{{ route('removeFromCart') }}`;
    const checkoutRoute = `{{ route('cart.checkout') }}`;
    const cartCountRoute = `{{ route('cart.count') }}`;

    function removeItemFromCart(productId) {
        fetch(removeFromCartRoute, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: productId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                updateCart(data.cart);
                updateTotalPrice(data.total);
                updateCartCount(); // Fetch and update cart count
            } else {
                alert('Failed to remove item from cart.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    function updateCart(cart) {
        const orderContainer = document.querySelector('.order-container');
        orderContainer.innerHTML = '';
        cart.forEach((item, productId) => {
            const itemHtml = `
                <div class="order-box">
                    <div class="order-item">
                        <img class="item-photo" src="{{ asset('images/') }}/${item.image}" alt="${item.name}">
                        <div class="item-data">
                            <div class="item-left">
                                <b class="item-name">${item.name}</b>
                                <b class="item-description">Quantity: ${item.quantity}</b>
                            </div>
                            <div class="item-right">
                                <b class="item-price">${(item.price * item.quantity).toFixed(2)} L.E</b>
                                <img src="{{ asset('images/delete.png') }}" alt="Delete" class="delete-item" data-id="${productId}">
                            </div>
                        </div>
                    </div>
                    <hr class="item-separator">
                </div>
            `;
            orderContainer.insertAdjacentHTML('beforeend', itemHtml);
        });

        // Reattach delete event listeners after updating the cart
        attachDeleteEventListeners();
    }

    function updateTotalPrice(total) {
        document.getElementById('totalPrice').innerText = `${total.toFixed(2)} L.E`;
        document.getElementById('totalCost').innerText = `${(total + 15).toFixed(2)} L.E`;
    }

    function updateCartCount() {
        fetch(cartCountRoute)
            .then(response => response.json())
            .then(data => {
                document.getElementById('cart-count').textContent = data.count;
            })
            .catch(error => console.error('Error fetching cart count:', error));
    }

    function checkout(paymentMethod) {
        fetch(checkoutRoute, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                payment_method: paymentMethod,
                size: 'medium' // Adjust as needed
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = "{{ route('success') }}";
            } else {
                alert('Checkout failed.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>
</body>
</html>