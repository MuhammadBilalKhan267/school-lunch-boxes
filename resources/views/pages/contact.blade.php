@extends('layouts.master')
@section('title','Contact Us - School Lunch Boxes')
@section('head')
    <link rel="stylesheet" href="css/contact.css"/>
    <link rel="stylesheet" href="css/alert.css"/>
@endsection

@section('content')
    <section id="contact">
        <h2>Contact Us</h2>
        <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <textarea name="message" rows="6" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
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
<script src="js/alert.js"></script>
@endsection