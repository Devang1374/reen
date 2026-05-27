@extends('layouts.mylayout')

@section('title', 'Contact Us')

@section('content')

<div class="main-section contact-us">
    <div class="container">
        <div class="contact-us-wrapper">
    
    <h1>Contact Us</h1>

    <form method="POST" action="{{ route('sendFeedBack') }}">
        @csrf {{-- Cross-Site Request Forgery protection --}}
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br>

        <input type="submit" value="Submit">
    </form>
        </div>
    </div>
</div>

@endsection