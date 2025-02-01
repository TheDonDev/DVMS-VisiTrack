<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Status</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheets" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
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
<body>
    <h1>Visit Status</h1>
    <p>Host Phone: {{ $host->phone }}</p> <!-- Updated to use host object -->


    <p>Date: {{ $visit->visit_date }}</p>
    <p>Visitors:</p>
    <ul>
        <li>Name: {{ $visit->visitor_name }}</li>
        <li>Email: {{ $visit->visitor_email }}</li>
        <li>Host Phone: {{ $visit->host_phone }}</li> <!-- Added host phone number -->
    </ul>
    <form action="{{ route('visit.status') }}" method="POST" id="visit-status-form">

    @csrf
    <input type="hidden" name="visit_number" value="{{ $visit->visit_number }}">

    <!-- Meeting & Check-Out -->
    <section class="bg-white shadow-lg rounded-lg p-6 mb-12">
        <h3 class="text-2xl font-bold text-primary mb-4">Meeting & Check-Out</h3>

        <button class="mt-4 bg-primary text-white px-4 py-2 rounded" type="button" onclick="notifyHost()">Notify Host</button>
        <button class="mt-4 bg-primary text-white px-4 py-2 rounded" type="button" onclick="checkOut()">Check Out</button>
    </section>
</form>

    <script>
    function notifyHost() {
        // Fetch host details and show in a popup
        fetch('{{ route('notify.host') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ visit_number: document.querySelector('input[name="visit_number"]').value })
        })
        .then(response => response.json())
        .then(data => {
            alert(`Host Email: ${data.email}\nHost Phone: ${data.phone}`);
        });
    }

    function checkOut() {
        // Send checkout request
        fetch('{{ route('checkout') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ visit_number: document.querySelector('input[name="visit_number"]').value })
        })
        .then(response => response.json())
        .then(data => {
            alert('Check-out successful!.');
        });
    }
</script>
