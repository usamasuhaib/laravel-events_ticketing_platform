@extends('MasterLayout.master')
@section('title', 'Events')

@section('main-content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Event Details</h3>
    </div>
    @if (session('error'))
    <div class="callout callout-info">
        <div class="alert alert-success">
            <b> {{ session('error') }}</b>
        </div>
    </div>
@endif

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Event Information</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Event Title:</th>
                        <td>{{ $event->event_title }}</td>
                    </tr>
                    <tr>
                        <th>Capacity:</th>
                        <td>{{ $event->capacity }}</td>
                    </tr>
                    <tr>
                        <th>Ticket Price:</th>
                        <td>{{ $event->ticket_price }} &dollar;</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
                <h4>Revenue and Tickets Sold</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Tickets Sold:</th>
                        <td>{{ $ticketsSold }}</td>
                    </tr>
                    <tr>
                        <th>Revenue:</th>
                        <td>{{ $revenue }} &dollar;</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Download Attendee List Button -->
<div class="mt-4">
    <a href="{{ route('organizer.download-attendees', $event->id) }}" class="btn btn-success">Download Attendee List (Excel)</a>
</div>

@endsection
