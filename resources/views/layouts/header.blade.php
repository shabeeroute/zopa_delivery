<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Meal Plans | Zopa Food Drop')</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/global.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/font-awesome/css/all-6.0.0.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

    <!-- Standard favicon -->
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon">

    <!-- For modern browsers -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

    <!-- Apple Touch Icon (iPhone/iPad) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">

    <!-- Android Chrome Icons -->
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('favicon/android-chrome-512x512.png') }}">

    <!-- Manifest (for Android and PWA) -->
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">

    <!-- Microsoft Tiles -->
    <meta name="msapplication-TileColor" content="#ec1d23">
    <meta name="msapplication-TileImage" content="{{ asset('favicon/android-chrome-192x192.png') }}">

    <!-- Theme Color (browser UI) -->
    <meta name="theme-color" content="#ec1d23">
    <style>
        /* Zopa Install Modal Styles */
        #installAppModal .modal-content {
        border-radius: 1rem;
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
        }

        #installAppModal .modal-header {
        background-color: #d62f2f; /* Zopa red */
        color: #fff;
        border-bottom: none;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        }

        #installAppModal .modal-body {
        padding-top: 1rem;
        padding-bottom: 1rem;
        }

        #installAppModal .modal-footer {
        border-top: none;
        justify-content: space-between;
        }

        #installAppModal .btn-primary {
        background-color: #d62f2f; /* Zopa red */
        border-color: #d62f2f;
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        }

        #installAppModal .btn-primary:hover {
        background-color: #b72828;
        border-color: #b72828;
        }

        #installAppModal .btn-secondary {
        color: #6c757d;
        background: none;
        border: none;
        text-decoration: underline;
        padding: 0;
        }

        #installAppModal .btn-secondary:hover {
        color: #495057;
        }

        /* Zopa Modal Animation */
        @keyframes zopaModalShow {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.98);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        }

        #installAppModal .modal-dialog {
        transition: transform 0.3s ease-out, opacity 0.3s ease-out;
        }

        #installAppModal.show .modal-dialog {
        animation: zopaModalShow 0.35s ease forwards;
        }

        /* Zopa Toast Styles */
        #installToast {
        background-color: #198754; /* Bootstrap success green */
        border-radius: 0.75rem;
        box-shadow: 0 0.25rem 0.75rem rgba(0,0,0,0.15);
        }

    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <button id="installAppBtn" style="display:none;" class="btn btn-primary">
    Install Zopa App
    </button>
    <!-- Navigation Bar -->
    <!-- Paste your navigation code here -->

    {{-- @yield('content') --}}
    @include('includes.nav')
