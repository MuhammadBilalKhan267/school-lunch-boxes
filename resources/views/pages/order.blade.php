@extends('layouts.master')
@section('title', 'Order Your School Lunch Box')
@section('head')
    <link rel="stylesheet" href="css/form.css"/>    
@endsection

@section('content')
<main>
    <h1>Order Your School Lunch Box</h1>

    <form id="lunch-box-form">
        @csrf  <!-- CSRF Token -->
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
        <span id="name-error" class="error"></span>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
        <span id="email-error" class="error"></span>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required>
        <span id="phone-error" class="error"></span>

        <label for="lunch-box">Select Lunch Box:</label>
        <select id="lunch-box" name="lunch-box" required>
            <option value="">Choose a Lunch Box</option>
            <option value="gourmet">Gourmet Lunch Box</option>
            <option value="bread-breakfast">Bread & Breakfast</option>
            <option value="hot-lunch">Hot Lunch</option>
            <option value="picnic">Picnic Package</option>
        </select>
        <span id="lunch-box-error" class="error"></span>

        <button type="submit">Submit</button>
    </form>

    <p id="success-message" class="message success"></p>
    <p id="error-message" class="message error"></p>
</main>
@endsection

@section('js')
<script src="js/form.js"></script>
@endsection
