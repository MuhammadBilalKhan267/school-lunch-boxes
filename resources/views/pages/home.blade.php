@extends('layouts.master')

@section('title', 'School Lunch Boxes - Multan')

@section('head')
    <link rel="stylesheet" href="css/hero.css"/>
    <link rel="stylesheet" href="css/services.css"/>
    <link rel="stylesheet" href="css/description.css"/>
    <link rel="stylesheet" href="css/testimonials.css"/>
    <link rel="stylesheet" href="css/alert.css"/>
@endsection

@section('content')

<section id="hero">
    <video autoplay muted loop id="hero-video">
        <track src="subtitles_en.vtt" kind="subtitles" srclang="en" label="English">
        <track src="descriptions_en.vtt" kind="descriptions" srclang="en" label="English">
        <source src="media/main_video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="theflex">
        <h1 class="animated-text">
            Fueling Healthy Minds with <span class="swap-text">Freshness, Variety, and Goodness</span> Delivered to Your Doorstep.
        </h1>
        
        <a href="#services"><button>Explore Our Services</button></a>
    </div>
</section>



<section id="services">
    <h2>Explore Our Services</h2>
    <div id="services-grid">
        @foreach ($services as $service)
            <div class="service-card">
                <img src="{{$service->imgUrl}}" alt="{{$service->name}}" class="service-img">
                <div class="service-content">
                    <h3>{{$service->name}}</h3>
                    <p class="short-desc" data-full-desc="{{$service->description}}">
                        <!-- Truncated version will be filled by JS -->
                    </p>
                    <button class="show-details-btn">Show Details</button>
                </div>
                <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
        <form id="add-service-form">
        @csrf
        <label for="service-title">Service Title:</label>
        <input type="text" id="service-title" required><br>

        <label for="service-desc">Service Description:</label>
        <textarea id="service-desc" rows="3" required></textarea><br>

        <label for="service-img">Image URL:</label>
        <input type="url" id="service-img" required><br>

        <button type="submit" class="btn">Add Service</button>
    </form>
</section>

<!-- Popup Structure -->
<div id="popup" class="popup hidden">
    <div class="popup-content">
        <h3 id="popup-title"></h3>
        <p id="popup-desc"></p>
        <button id="hide-details-btn">Hide Details</button>
    </div>
</div>


<section id="description">
    <h2 class="description-title">Why Choose School Lunch Boxes?</h2>
    <div class="description-grid">
        <!-- Icon 1: Fresh Ingredients -->
        <div class="description-item">
            <i class="fas fa-leaf icon"></i>
            <h3>Fresh Ingredients</h3>
            <p>We source the freshest ingredients to ensure that every lunch box is filled with nutritious and wholesome food.</p>
        </div>

        <!-- Icon 2: Variety of Options -->
        <div class="description-item">
            <i class="fas fa-utensils icon"></i>
            <h3>Variety of Options</h3>
            <p>From gourmet lunch boxes to freshly baked bread and daily hot lunches, we provide a wide variety of delicious options.</p>
        </div>

        <!-- Icon 3: Health & Nutrition -->
        <div class="description-item">
            <i class="fas fa-heartbeat icon"></i>
            <h3>Health & Nutrition</h3>
            <p>Our meals are carefully curated to promote health and wellness, ensuring balanced nutrition for growing minds and bodies.</p>
        </div>

        <!-- Icon 4: Timely Delivery -->
        <div class="description-item">
            <i class="fas fa-shipping-fast icon"></i>
            <h3>Timely Delivery</h3>
            <p>We guarantee free and timely delivery with every order, ensuring your meals arrive fresh and ready to eat.</p>
        </div>

        <!-- Icon 5: Special Event Catering -->
        <div class="description-item">
            <i class="fas fa-birthday-cake icon"></i>
            <h3>Special Event Catering</h3>
            <p>We offer customizable catering packages for school trips, staff functions, and other special events with finger food platters.</p>
        </div>
    </div>
</section>
<section id="testimonials">
    <h2>What Our Clients Say</h2>
    <div class="testimonial-carousel">
        <div class="testimonial-item">
            <img src="media/pic1.jpeg" alt="Client 1" class="testimonial-img">
            <p class="testimonial-text">“The lunch boxes are fresh and delicious. Deliveries are always on time and sorted efficiently for students and staff.”</p>
        </div>
        <div class="testimonial-item">
            <img src="media/pic2.jpg" alt="Client 2" class="testimonial-img">
            <p class="testimonial-text">“Lunch boxes offer a unique and welcoming variety. It inspired me to think about improving customer relations.”</p>
        </div>
        <div class="testimonial-item">
            <img src="media/pic3.jpeg" alt="Client 3" class="testimonial-img">
            <p class="testimonial-text">“My mother was reassured by the nutritional breakdown, helping me make better decisions about which lunch box to order.”</p>
        </div>
    </div>
</section>

<!-- Flash Message -->
@if (session('success'))
    <div class="alert alert-success" id="success-message">{{ session('success') }}</div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="error-message">{{ session('error') }}</div>
@endif

@endsection

@section('js')
<script src="js/script.js"></script>
<script src="js/alert.js"></script>
@endsection
