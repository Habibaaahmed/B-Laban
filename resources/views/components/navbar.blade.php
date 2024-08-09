<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Laban</title>
    <style>
        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            border-bottom: 1px solid #ccc;
            padding: 10px 30px;
            height:100px;
            /* margin-right: 30px; */
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
        }
        .nav-icons img {
            width: 20px;
            height: auto;
            margin-left: 20px;
            cursor: pointer;
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
        }
        .contact-btn img {
            margin-left: 0px;
            margin-right: 10px;
            width: 17px;
        }
        .contact-btn:hover {
            background-color: #007acc;
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
            <a href="{{ route('cart') }}"><img src="{{ asset('images/cart.png') }}" alt="Cart" ></a>
            <a href="{{ route('profile') }}" class="contact-btn">Profile</a>
        </div>
    </div>


</body>
</html>
