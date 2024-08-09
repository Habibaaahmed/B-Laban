<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }
        .search-bar input[type="text"] {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .product-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .product-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            width: 220px;
            transition: transform 0.5s ease;
            text-decoration: none;
            color: inherit;
        }
        .product-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #48a9e6;
            padding: 15px;
        }
        .product-card:hover {
            transform: translateY(-10px);
            border: #39A1DB solid 3px;
        }
        .product-card .name {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
        }
        .product-card .price {
            margin-top: 10px;
            font-size: 16px;
            color: #555;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search').on('keyup', function() {
                let query = $(this).val();

                $.ajax({
                    url: "{{ route('category.search', $category->id) }}",
                    type: "GET",
                    data: {'query': query},
                    success: function(data) {
                        $('.product-grid').html('');

                        if (data.products.length > 0) {
                            data.products.forEach(function(product) {
                                let productHtml = `
                                    <a href="/product/${product.id}" class="product-card">
                                        <img src="/images/${product.image}" alt="${product.name}">
                                        <div class="name">${product.name}</div>
                                        <div class="price"><span class="dollar">$</span>${parseFloat(product.price).toFixed(2)}</div>
                                    </a>
                                `;
                                $('.product-grid').append(productHtml);
                            });
                        } else {
                            $('.product-grid').html('<p>No products found</p>');
                        }
                    }
                });
            });
        });
    </script>
</head>
<body>
<x-navbar />
    <div class="container">
        <div class="title">Products in {{ $category->name }}</div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" id="search" placeholder="Search for a product...">
        </div>

        <div class="product-grid">
            @foreach($category->products as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="name">{{ $product->name }}</div>
                    <div class="price"><span class="dollar">$</span>{{ number_format($product->price, 2) }}</div>
                </a>
            @endforeach
        </div>
    </div>
<x-footer />
</body>
</html>