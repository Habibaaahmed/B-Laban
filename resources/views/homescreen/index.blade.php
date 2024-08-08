<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ice Cream Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            text-align: center;
            padding: 40px 0;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .category-grid {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;

        }
        .category-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            text-align: center;
            width: 180px;
            transition: transform 0.5s ease;

        }
        .category-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background-color: #48a9e6;
            padding: 15px;
        }
        .category-card:hover {
            transform: translateY(-10px);
            border:#39A1DB solid 3px;
        }
        .category-card .name {
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            }
            .category-card a{
                text-decoration: none;
                color: inherit;
            }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            list-style: none;
            padding: 0;
        }
        .pagination li {
            margin: 0 5px;
        }
        .pagination a, .pagination span {
            display: inline-block;
            padding: 10px 15px;
            background-color: #f1f1f1;
            color: #333;
            text-decoration: none;
            border-radius: 20px;
            font-size: 18px;
        }
        .pagination a:hover, .pagination span {
            background-color: #007acc;
            color: #fff;
        }
        .pagination .disabled span {
            pointer-events: none;
        }
        .standout-dishes {
    margin-top: 50px;
    text-align: left; /* Align text to the left */
}
.dollar{
    color:#FF6868;
}

.standout-dishes .title-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px; /* Space between title and cards */
}
.title{
    font-size:40px
}
.standout-dishes .dish-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 20px;
    width: 300px; /* Fixed width for uniform cards */
    height: auto; /* Allow height to adjust based on content */
    display: inline-block;
    vertical-align: top;
    position: relative; /* Ensure proper positioning of elements */
}

.standout-dishes .dish-card img {
    width: 100%; /* Image should fit the card width */
    height: 200px; /* Fixed height for images */
    object-fit: cover; /* Ensure the image covers the area */
    border-radius: 10px;
    margin-bottom: 15px; /* Space between image and content */
}

.standout-dishes .dish-card .name {
    font-size: 22px; /* Larger font size for name */
    font-weight: bold; /* Bold text */
    margin-bottom: 10px; /* Space below name */
}

.standout-dishes .dish-card .description {
    font-size: 14px; /* Adjust font size for description */
    color: #666;
    margin-bottom: 15px; /* Space below description */
}

.standout-dishes .dish-card .price {
    font-size: 16px; /* Font size for price */
    color: #555;
    float: left; /* Align price to the left */
    margin-right: 10px; /* Space between price and rating */
}

.standout-dishes .dish-card .rating {
    font-size: 16px; /* Font size for rating */
    color: #555;
    float: right; /* Align rating to the right */
}

.standout-dishes .dish-card::after {
    content: "";
    display: table;
    clear: both; /* Clear floats */
}

.standout-dishes .dish-card .footer {
    position: absolute;
    bottom: 20px; /* Distance from the bottom */
    width: 100%;
    display: flex;
    justify-content: space-between; /* Space between price and rating */
}
.review-cards {
            text-align: left;
            margin-top: 50px;
        }
        .review-cards .title {
            font-size: 40px;
            text-align: center;
            margin-bottom:100px;
        }
        .review-cards .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-top: 50px;
        }
        .review-card {
            background: #fff;
            border-radius: 50px 10px 50px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            width: 400px;
            text-align: center;
            position: relative;
        }
        .review-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
        }
        .review-card .review-text {
            font-size: 18px;
            color: #666;
            margin-top: 40px;
            margin-bottom: 15px;
        }
        .review-card .reviewer-name {
            font-size: 20px;
            font-weight: bold;
        }
        .culinary-journey {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 50px;
            text-align: left;
        }
        .journey-text {
            width: 45%;
            margin-top:70px;
        }
        .journey-text .title {
            font-size: 40px;
            margin-bottom: 20px;
        }
        .journey-text p {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .explore-btn {
            background-color: #48a9e6;
            color: #fff;
            padding: 12px 22px;
            text-decoration: none;
            border-radius: 25px;
            text-align: center;
            display: inline-block;
            font-size: 18px;
        }
        .explore-btn:hover {
            background-color: #007acc;
        }
        .journey-cards {
            width: 50%;
            color:#39A1DB;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .journey-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 10px;
            padding: 20px;
            width: 230px;
            text-align: center;
           color:#39A1DB;
        }
        .journey-card img {
            width: 50px;
            height: 50px;
            /* border-radius: 50%; */
            margin-bottom: 15px;
        }
        .journey-card .title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .journey-card .description{
            line-height:20px;
            text-align:center;
            padding:0px 20px
        }
        /* .socialMedia a:hover{
            background-color: #39A1DB;
            border-radius:50%;
            padding:10px;
            transform: scale(1.1);
        } */

    </style>
</head>
<body>
<x-navbar />
    <div class="banner" id="home">
        <img src="{{ asset('images/banner.jfif') }}" style="width: 100%; height: auto;">
    </div>
    <div class="container">
        <div class="title">Popular Categories</div>
        <div class="category-grid" id="category-grid">
            @foreach($categories as $category)
                @php
                    $product = $category->products->first();
                @endphp
                @if ($product)
                    <div class="category-card">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $category->name }}">
                            <div class="name">{{ $category->name }}</div>
                        </a>
                    </div>
                @endif
            @endforeach

        </div>

        <!-- Pagination Links -->
        <div class="pagination" id="category-pagination">
            @if ($categories->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>&laquo;</span></li>
            @else
                <li><a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            @if ($categories->hasMorePages())
                <li><a href="{{ $categories->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>&raquo;</span></li>
            @endif
        </div>
    </div>

    <!-- Standout Dishes Section -->
    <div class="container standout-dishes" id="menu">
    <div class="title-container">
        <div class="title">Standout Dishes From Our Menu</div>
        <div class="pagination" id="dish-pagination">
            @if ($dishes->onFirstPage())
                <li class="disabled prev-arrow" aria-disabled="true"><span><</span></li>
            @else
                <li><a href="{{ $dishes->previousPageUrl() }}" rel="prev" class="prev-arrow"><</a></li>
            @endif

            @if ($dishes->hasMorePages())
                <li><a href="{{ $dishes->nextPageUrl() }}" rel="next" class="next-arrow">></a></li>
            @else
                <li class="disabled next-arrow" aria-disabled="true"><span>></span></li>
            @endif
        </div>
    </div>
    <div class="category-grid" id="dish-grid">
        @foreach($dishes as $dish)
            <div class="dish-card">
                <img src="{{ asset('images/' . $dish->image) }}" alt="{{ $dish->name }}">
                <div class="name">{{ $dish->name }}</div>
                <div class="description">{{ $dish->description }}</div>
                <div class="price"><span class="dollar">$</span>{{ number_format($dish->price, 2) }}</div>
                <div class="rating">
                    {{ number_format($dish->reviews->avg('rating'), 1) }}
                    @for ($i = 0; $i < floor($dish->reviews->avg('rating')); $i++)
                        ⭐
                    @endfor
                    @if ($dish->reviews->avg('rating') - floor($dish->reviews->avg('rating')) > 0)
                        ⭐
                    @endif
                </div>
            </div>
        @endforeach
    </div>


</div>
<div class="container review-cards">
        <div class="title">Our Happy Customers</div>
        <div class="card-container">
            <div class="review-card">
                <img src="{{ asset('images/person-1.png') }}" alt="Reviewer 1">
                <div class="review-text">"This ice cream is amazing! The best I've ever had."</div>
                <div class="reviewer-name">John Doe</div>
            </div>
            <div class="review-card">
                <img  src="{{ asset('images/person-2.png') }}" alt="Reviewer 2">
                <div class="review-text">"A delightful experience with every bite. Highly recommend!"</div>
                <div class="reviewer-name">Jane Smith</div>
            </div>

        </div>

    </div>
       <!-- Our Culinary Journey and Services Section -->
       <div class="container culinary-journey" id="services">
        <div class="journey-text">
            <div class="title">Our Culinary Journey And Services</div>
            <p>Rooted in passion, we curate unforgettable dining experiences and offer exceptional services, blending culinary artistry with warm hospitality.</p>
            <a href="#" class="explore-btn">Explore</a>
        </div>
        <div class="journey-cards">
            <div class="journey-card">
                <img src="{{ asset('images/catering.png') }}" alt="Card 1">
                <div class="title">Catering</div>
                <div class="description">Delight your guests with our flavors and  presentation</div>
            </div>
            <div class="journey-card">
                <img src="{{ asset('images/delivery.png') }}" alt="Card 2">
                <div class="title">Fast delivery</div>
                <div class="description">We deliver your order promptly to your door</div>
            </div>
            <div class="journey-card">
                <img src="{{ asset('images/ordering.png') }}" alt="Card 3">
                <div class="title">Online Ordering</div>
                <div class="description">Explore menu & order with ease using our Online Ordering </div>
            </div>
            <div class="journey-card">
                <img src="{{ asset('images/gift.png') }}" alt="Card 4">
                <div class="title">Gift Cards</div>
                <div class="description">Give the gift of exceptional dining with Foodi Gift Cards</div>
            </div>
        </div>
    </div>
    <!-- Footer Section -->
    <x-footer />





    <!-- Include the JavaScript here -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    function setupPagination(paginationId, gridId) {
        document.querySelectorAll(`#${paginationId} a`).forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                const url = this.getAttribute('href');

                fetch(url)
                    .then(response => response.text())
                    .then(html => {
                        const parser = new DOMParser();
                        const doc = parser.parseFromString(html, 'text/html');

                        const newGrid = doc.querySelector(`#${gridId}`).innerHTML;
                        const newPagination = doc.querySelector(`#${paginationId}`).innerHTML;

                        document.querySelector(`#${gridId}`).innerHTML = newGrid;
                        document.querySelector(`#${paginationId}`).innerHTML = newPagination;

                        // Re-attach event listeners to new pagination links
                        setupPagination(paginationId, gridId);
                    });
            });
        });
    }

    setupPagination('category-pagination', 'category-grid');
    setupPagination('dish-pagination', 'dish-grid');
});

    </script>
</body>
</html>
