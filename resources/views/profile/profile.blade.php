<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=David+Libre:wght@700&display=swap" />
    <style>
        /* Example CSS for hidden class and overlay */
        .hidden { display: none; }
        .overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); }
        .logout-confirmation { position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border-radius: 8px; }
    </style>
    <script>
     document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-review').forEach(function(button) {
        button.addEventListener('click', function() {
            const reviewId = this.getAttribute('data-id');

            // Show the confirmation popup
            document.getElementById('overlay').classList.remove('hidden');
            document.getElementById('delete-confirmation').classList.remove('hidden');
            document.getElementById('confirm-delete').setAttribute('data-id', reviewId);
        });
    });

    document.getElementById('confirm-delete').addEventListener('click', function() {
        const reviewId = this.getAttribute('data-id');

        fetch(`/reviews/${reviewId}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirect to the profile page
                window.location.href = "{{ route('profile') }}"; // Replace with the actual route name or URL
            } else {
                alert('Failed to delete the review. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to delete the review. Please try again.');
        });
    });

    document.getElementById('cancel-delete').addEventListener('click', function() {
        hideDeleteConfirmation();
    });
});



        function hideDeleteConfirmation() {
            // Hide overlay and confirmation box
            document.getElementById('overlay').classList.add('hidden');
            document.getElementById('delete-confirmation').classList.add('hidden');
        }
        function toggleEditMode() {
            const infoFields = document.querySelectorAll('.info-field');
            const editFields = document.querySelectorAll('.edit-field');
            const editButton = document.getElementById('edit-button');
            const saveCancelContainer = document.getElementById('save-cancel-container');

            infoFields.forEach(field => field.classList.toggle('hidden'));
            editFields.forEach(field => field.classList.toggle('hidden'));
            editButton.classList.toggle('hidden');
            saveCancelContainer.classList.toggle('hidden');
        }

        function saveChanges() {
            const infoFields = document.querySelectorAll('.info-field');
            const editFields = document.querySelectorAll('.edit-field');

            infoFields.forEach((field, index) => {
                field.textContent = editFields[index].value;
            });

            toggleEditMode();
            document.getElementById('profile-edit-form').submit()
        }

        function cancelChanges() {
            const editFields = document.querySelectorAll('.edit-field');
            const initialValues = ['Darine Mourad', 'DarineMourad@gmail.com', 'Media Production City, 6th of October City, Giza, Egypt.', '01234567895'];

            editFields.forEach((field, index) => {
                field.value = initialValues[index];
            });

            toggleEditMode();
        }

        function activateSection(element, sectionToShow) {
            const sections = document.querySelectorAll('.part-section');
            const rightSections = document.querySelectorAll('.right-section');

            // Remove active class from all left-section items
            sections.forEach(section => section.classList.remove('selected-one'));

            // Hide all right-section divs
            rightSections.forEach(section => section.classList.add('hidden'));

            // Show the selected right-section
            const section = document.querySelector(sectionToShow);
            section.classList.remove('hidden');

            // Add active class to the clicked element
            element.classList.add('selected-one');

            // Show overlay and logout confirmation if "Logout" is clicked
            if (sectionToShow === '.logout-right-section') {
                document.getElementById('overlay').classList.remove('hidden');
                document.getElementById('logout-confirmation').classList.remove('hidden');
            }
        }

        function hideLogoutConfirmation() {
            // Hide overlay and logout confirmation box
            document.getElementById('overlay').classList.add('hidden');
            document.getElementById('logout-confirmation').classList.add('hidden');

            // Activate the profile section
            const profileSectionElement = document.querySelector('.part-section:nth-child(1)'); // Assuming profile is the first section
            activateSection(profileSectionElement, '.profile-right-section');
        }

        function logout() {
            // Handle logout logic here
            alert("Logging out...");
        }
    </script>
</head>

<body>
<x-navbar />

    <div class="main-section">
        <div class="left-section">
            <div class="user-profile-part">
                <img class="user-profile" alt="" src="{{ asset(auth()->user()->profile_picture) }}">
                <b class="user-name">{{ auth()->user()->name }}</b>
            </div>
            <div class="part-section selected-one" onclick="activateSection(this, '.profile-right-section')">
                <b>Profile</b>
                <b class="separator">></b>
            </div>
            <div class="part-section" onclick="activateSection(this, '.myorders-right-section')">
                <b>My orders</b>
                <b class="separator">></b>
            </div>
            <div class="part-section" onclick="activateSection(this, '.myreviews-right-section')">
                <b>My reviews</b>
                <b class="separator">></b>
            </div>
            <div class="part-section" onclick="activateSection(this, '.logout-right-section')">
                <b>Logout</b>
                <b class="separator">></b>
            </div>
        </div>

        <!-- Right Sections -->
        <div class="right-section profile-right-section">
            <div class="general-info">
                <b>General Information</b>
                <b class="separator"></b>
                <a id="edit-button" href="javascript:void(0);" onclick="toggleEditMode()">Edit ></a>
                <div id="save-cancel-container" class="hidden save-cancel">
                    <a href="javascript:void(0);" onclick="saveChanges()">Save</a> / 
                    <a href="javascript:void(0);" onclick="cancelChanges()">Cancel</a>
                </div>
            </div>
            <hr class="custom-separator">
           <!-- Form for editing profile -->
<form id="profile-edit-form" method="POST" action="{{ route('profile.update') }}">
    @csrf
    <div class="field">
        <b class="part1-field">Name</b>
        <b class="info-field">{{ auth()->user()->name }}</b>
        <input type="text" name="name" class="edit-field hidden" value="{{ auth()->user()->name }}">
    </div>
    <div class="field">
        <b class="part1-field">Email</b>
        <b class="info-field">{{ auth()->user()->email }}</b>
        <input type="email" name="email" class="edit-field hidden" value="{{ auth()->user()->email }}">
    </div>
    <div class="field">
        <b class="part1-field">Address</b>
        <b class="info-field">{{ auth()->user()->address }}</b>
        <input type="text" name="address" class="edit-field hidden" value="{{ auth()->user()->address }}">
    </div>
    <div class="field">
        <b class="part1-field">Phone</b>
        <b class="info-field">{{ auth()->user()->phone_number }}</b>
        <input type="text" name="phone_number" class="edit-field hidden" value="{{ auth()->user()->phone_number }}">
    </div>
</form>

        </div>
        <div class="right-section myorders-right-section hidden">
    <b class="title-section">Order History</b>

    <div class="order-container">
        <!-- First Order Box with Two Items -->
        <div class="order-box">
       
        <b class="date">Date: 4/8/2024 </b>
       
            <div class="order-item">
                <img class="item-photo" alt="" src="{{ asset('images/mango_qonbela_rice_pudding.jpg') }}">
                <div class="item-data">
                    <div class="item-left">
                        <b class="item-name">Item 1</b>
                        <b class="item-description">Description of Item 1</b>
                    </div>
                    <div class="item-right">
                        <b class="item-price">240.00 L.E</b>
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
                    </div>
                </div>
            </div>
            <b class="total-price">Total: 400.00 L.E</b>
        </div>

        <!-- Second Order Box with One Item -->
        <div class="order-box">
        <b class="date">Date: 24/6/2024 </b>
            <div class="order-item">
                <img class="item-photo" alt="" src="{{ asset('images/mango_qonbela_rice_pudding.jpg') }}">
                <div class="item-data">
                    <div class="item-left">
                        <b class="item-name">Item 3</b>
                        <b class="item-description">Description of Item 3</b>
                    </div>
                    <div class="item-right">
                        <b class="item-price">200.00 L.E</b>
                    </div>
                </div>
            </div>
            <b class="total-price">Total: 200.00 L.E</b>
        </div>
    </div>

    <!-- Pagination Arrows -->
    <ul class="pagination">

        <li><a href="#" rel="prev" class="prev-arrow"><</a></li>
        <li><a href="#" rel="next" class="next-arrow">></a></li>
       
    </ul>
</div>
<div class="right-section myreviews-right-section hidden">
    <b class="title-section">Reviews</b>

    @if(Auth::user()->reviews->isEmpty())
        <div class="no-reviews">
            <b class="text-right-section">NO REVIEWS</b>
        </div>
    @else
        <div class="review-container">
            @foreach(Auth::user()->reviews as $review)
                <div class="review-row">
                    <div class="review-box">
                        <img class="item-photo" alt="" src="{{ asset(Auth::user()->profile_picture) }}">
                        <div class="review-data">
                            <b>{{ Auth::user()->name }}</b>
                            <b class="review-content">{{ $review->comment }}</b>
                        </div>
                    </div>
                    <img src="{{ asset('images/delete.png') }}" alt="" class="delete-review" data-id="{{ $review->id }}">
                </div>
            @endforeach
        
            @if(Auth::user()->reviews->count() > 2)
                <ul class="pagination">
                    <li><a href="#" rel="prev" class="prev-arrow"><</a></li>
                    <li><a href="#" rel="next" class="next-arrow">></a></li>
                </ul>
            @endif
        </div>
    @endif
</div>
    <!-- Delete Confirmation Popup -->
    <div id="overlay" class="overlay hidden"></div>
    <div id="delete-confirmation" class="confirmation-popup hidden">
    <p style="
        color: #0066A1;
        font-size: 25px;
        margin-bottom: 20px;
        font-family: 'Open Sans', sans-serif;
    ">Are you sure you want to delete this review?</p>
        <form id="review-form" action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" id="confirm-delete">Delete</button>
            <button type="button" id="cancel-delete">Cancel</button>
        </form>
    </div>

<div class="right-section logout-right-section hidden">
    <div id="overlay" class="overlay hidden"></div>
    <div id="logout-confirmation" class="logout-confirmation hidden">
        <p>Are you sure you want to log out?</p>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
            <button type="button" onclick="hideLogoutConfirmation()">Cancel</button>
        </form>
    </div>
</div>

    </div></div>
    <x-footer />
</body>


</html>
