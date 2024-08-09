<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=David+Libre:wght@700&display=swap" />
    <title>cart</title>
</head>
<body>
      <x-navbar />
      <div class="main">
        <div class="left-main">

            <div class="cart-section">

            <b class="title">Cart</b>
            <p class="description">Check your cart items before proceeding to payment </p>

<div class="order-container">
    <!-- First Order Box with Two Items -->
    <div class="order-box">
        <div class="order-item">
            <img class="item-photo" alt="" src="{{ asset('images/mango_qonbela_rice_pudding.jpg') }}">
            <div class="item-data">
                <div class="item-left">
                    <b class="item-name">Item 1</b>
                    <b class="item-description">Description of Item 1</b>
                </div>
                <div class="item-right">
                    <b class="item-price">240.00 L.E</b>
                    <img src="{{ asset('images/delete.png') }}" alt="" class="delete-item" >
                </div>
            </div>
        </div>
        <hr class="item-separator">
        <div class="order-item">
            <img class="item-photo" alt="" src="{{ asset('images/mango_qonbela_rice_pudding.jpg') }}">
            <div class="item-data">
                <div class="item-left">
                    <b class="item-name">Item 2</b>
                    <b class="item-description">Description of Item 2</b>
                </div>
                <div class="item-right">
                    <b class="item-price">160.00 L.E</b>
                    <img src="{{ asset('images/delete.png') }}" alt="" class="delete-item" >
                </div>
            </div>
        </div>
        <b class="total-price">Total: 400.00 L.E</b>
    </div>

            </div>
            </div>
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
        <div class="order-summary">
    <b class="summary-title">Summary Order</b>
    <div class="summary-content">
        <div class="summary-item">
            <div class="summary-label">
                <b class="summary-name">Total:</b>
            </div>
            <div class="summary-value">
                <b class="summary-amount">300 L.E</b>
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
                <b class="summary-amount">315 L.E</b>
            </div>
        </div>
        <!-- Pay button -->
        <button class="pay-button">Pay</button>
    </div>
</div>

</div>
      <x-footer />
</body>
</html>