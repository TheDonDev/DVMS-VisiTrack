<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckMate | Alupe University</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.successMessage = "{{ session('success') }}";
    </script>
    <style>
        :root {
            --primary-color: #004080; /* Alupe's blue */
            --secondary-color: #ffcc00; /* Alupe's gold */
        }

        .bg-primary {
            background-color: var(--primary-color);
        }

        .text-primary {
            color: var(--primary-color);
        }

        .bg-secondary {
            background-color: var(--secondary-color);
        }

        .text-secondary {
            color: var(--secondary-color);
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Header -->
    <header class="bg-primary text-white py-4">
        <div class="container mx-auto flex items-center justify-between">
            <h1 class="text-2xl font-bold">CheckMate</h1>
            <img src="{{ asset('images/download.jfif') }}" alt="Alupe University Logo" class="h-12">
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-8">
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (window.successMessage) {
                    alert(window.successMessage);
                }
            });
        </script>

        <!-- Homepage Overview -->
        <section c
lass="text-center mb-12">
            <h2 class="text-3xl font-bold text-primary">Welcome to CheckMate</h2>
            <p class="mt-4 text-gray-700">An efficient digital visitor management system for Alupe University.</p>
        </section>

        <!-- Action Buttons -->
        <section class="text-center mb-12">
            <a href="{{ route('book.visit') }}" class="bg-primary text-white px-6 py-3 rounded mr-4">Book a Visit</a>
            <a href="{{ route('join.visit') }}" class="bg-secondary text-white px-6 py-3 rounded">Join a Visit</a>
        </section>

        <!-- Visitor Check-In -->
        <section class="bg-white shadow-lg rounded-lg p-6 mb-12">
        <h3 class="text-2xl font-bold text-primary mb-4">Visitor Check-In</h3>
            <form action="{{ route('visit.status') }}" method="POST">
            @csrf
                <input class="border p-2 rounded w-full mb-4" type="text" name="visit_number" placeholder="Enter Visit Number" required>
            <button class="mt-4 bg-primary text-white px-4 py-2 rounded" type="submit">Check-In</button>
            </form>
        </section>


        <!-- Feedback -->
        <section class="bg-white shadow-lg rounded-lg p-6">
            <h3 class="text-2xl font-bold text-primary mb-4">Feedback</h3>
            <form id="feedback-form">
                <textarea placeholder="Share your experience..." class="border p-2 rounded w-full mb-4" rows="5" required></textarea>
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded">Submit Feedback</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-white py-4 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Alupe University. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>