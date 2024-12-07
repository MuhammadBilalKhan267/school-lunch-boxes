@extends('layouts.master')
@section('title', 'Pricing - School Lunch Boxes')
@section('head')
    <link rel="stylesheet" href="css/pricing.css"/>    
@endsection

@section('content')
    
    <main id="content">
            <div class="hero">
                <h1>Our Pricing</h1>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Standard Lunch Box</td>
                        <td>A balanced meal with a variety of options.</td>
                        <td>PKR 500</td>
                    </tr>
                    <tr>
                        <td>Gourmet Lunch Box</td>
                        <td>Premium selection of gourmet ingredients.</td>
                        <td>PKR 1000</td>
                    </tr>
                    <tr>
                        <td>Hot Lunch Delivery</td>
                        <td>Freshly cooked meals delivered hot.</td>
                        <td>PKR 750</td>
                    </tr>
                    <tr>
                        <td>Picnic Package</td>
                        <td>A delightful assortment for your outdoor events.</td>
                        <td>PKR 1500</td>
                    </tr>
                    <tr>
                        <td>Custom Lunch Box</td>
                        <td>Create your own meal from a selection of items.</td>
                        <td>PKR 1200</td>
                    </tr>
                </tbody>
            </table>

            <div class="contact">
                <a href="{{ route('contact') }}" class="button">Contact Us for More Details</a>
            </div>
    </main>
@endsection
