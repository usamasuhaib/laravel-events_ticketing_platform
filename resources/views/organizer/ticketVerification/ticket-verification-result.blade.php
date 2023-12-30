@extends('MasterLayout.master')
@section('title', 'Ticket Verification Result')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ticket Verification Result</h1>
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
                    <h4 class="card-title">Ticket Verification Result</h4>

                    @if (isset($ticket))
                        <div class="alert alert-success">
                            <strong>Success!</strong> Ticket verification successful.
                        </div>

                        <div class="ticket-details">
                            <h5>Ticket Details</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Ticket ID:</strong> {{ $ticket->ticket_id }}</li>
                                <li class="list-group-item"><strong>Event Title:</strong> {{ $ticket->event->event_title }}</li>
                                <li class="list-group-item"><strong>Attendee Name:</strong> {{ $attendee->name }}</li>
                                <li class="list-group-item"><strong>Payment Status:</strong> {{ $ticket->status }}</li>

                                <li class="list-group-item"><strong>Event Date:</strong> {{ $ticket->event->event_date }}</li>

                            </ul>
                        </div>
                    @else
                        <div class="alert alert-danger">
                            <strong>Error!</strong> Ticket verification failed. {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
