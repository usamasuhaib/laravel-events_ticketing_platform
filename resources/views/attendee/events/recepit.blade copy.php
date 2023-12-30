@extends('MasterLayout.master')
@section('title', 'Buy Ticket')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invioce</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Buy Ticket</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')
<!-- Ticket content -->
<div class="ticket">
    <div class="ticket-header">
        <h2 class="ticket-title">
            GB Events Ticket
        </h2>
    </div>
    <div class="ticket-details">
        <div class="ticket-info">
            <p><strong>Event:</strong> {{ $event->event_title }}</p>
            <p><strong>Date:</strong> {{ $event->event_date }}</p>
            <p><strong>Time:</strong> {{ $event->event_time }}</p>
            <p><strong>Venue:</strong> {{ $event->venue }}</p>
            <p><strong>Organizer:</strong> {{ $event->organizer ? $event->organizer->name : 'N/A' }}</p>
        </div>
        <div class="ticket-barcode">
            <!-- Add your barcode or QR code here -->
            <!-- Example: <img src="barcode.png" alt="Barcode" width="100" height="100"> -->
        </div>
    </div>
    <div class="ticket-footer">
        <p><strong>Ticket Price:</strong> ${{ $event->ticket_price }}</p>
    </div>
</div>
<!-- /.ticket -->

<!-- Print and Download buttons -->
<div class="row no-print">
    <div class="col-12">
        <a href="#" onclick="window.print();" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        <button type="button" class="btn btn-primary float-right" onclick="generatePDF()"><i class="fas fa-download"></i> Generate PDF</button>
    </div>
</div>

<!-- JavaScript for generating PDF -->
<script>
    function generatePDF() {
        // Add code to generate PDF here
        // You can use a PDF generation library as mentioned earlier
    }
</script>
@endsection

