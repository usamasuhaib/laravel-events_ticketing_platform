@extends('MasterLayout.master')
@section('title', 'Download Ticket')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Download Ticket</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('frontend-assets/img/gb-events-logo2.png') }}" alt="GB Events Logo" width="150">
                    </div>

                    <h4 class="text-center">Ticket ID: {{ $ticket->ticket_id }}</h4>

                    <!-- Event Details -->
                    <h5 class="mt-4">Event Details:</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Event Title:</strong> {{ $event->event_title }}</li>
                        <li class="list-group-item"><strong>Date:</strong> {{ $event->event_date }}</li>
                        <li class="list-group-item"><strong>Venue:</strong> {{ $event->venue }}</li>
                        <li class="list-group-item"><strong>Price:</strong> ${{ $event->ticket_price }}</li>
                        <li class="list-group-item"><strong>Payment Status:</strong> {{ $ticket->status }}</li>
                    </ul>

                    <!-- Organizer Details -->
                    <h5 class="mt-4">Organizer Details:</h5>
                    <ul class="list-group">
                        <li class="list-group-item"><strong>Name:</strong> {{ $organizer->name }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $organizer->email }}</li>
                        <li class="list-group-item"><strong>Phone:</strong> {{ $organizer->phone }}</li>
                    </ul>

                    <!-- QR Code -->
                    <div class="text-center mt-4">
                        <img src="https://example.com/qrcode/{{ $ticket->ticket_id }}" alt="QR Code" width="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
    // Function to initiate download
    function initiateDownload() {
        var downloadLink = document.createElement('a');
        downloadLink.href = window.location.href; // Current page URL
        downloadLink.download = 'ticket_invoice.pdf'; // Default file name
        downloadLink.target = '_blank';

        var event = new MouseEvent('click', {
            'view': window,
            'bubbles': true,
            'cancelable': true
        });

        downloadLink.dispatchEvent(event);
    }

    // Function to check if a printer is connected and print the page
    function checkPrinterAndPrint() {
        try {
            if (window.print()) {
                // Printing is supported, initiate download as a fallback
                initiateDownload();
            }
        } catch (error) {
            // Printing is not supported, initiate download directly
            initiateDownload();
        }
    }

    // Trigger the print function when the page loads
    window.addEventListener("load", function() {
        checkPrinterAndPrint();
    });
</script>
@endsection
