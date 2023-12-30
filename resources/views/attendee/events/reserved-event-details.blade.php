@extends('MasterLayout.master')
@section('title', 'Event Details')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Event Details</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Event details and image -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('images/events/' . $event->image) }}" alt="Event Banner" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3><b>{{ $event->event_title }}</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="event-details">
                                <div class="event-description">
                                    <p><strong>Description:</strong></p>
                                    <p>{{ $event->description }}</p>
                                </div>
                                <p><strong>Event Category:</strong> {{ $event->category }}</p>
                                <p><strong>Organizer Name:</strong> {{ $event->organizer->name }}</p>
                                <p><strong>Email (Organizer):</strong> {{ $event->organizer->email }}</p>
                            </div>
                            <hr>
                            <div class="ticket-price">
                                <h3>Ticket Price: {{ $event->ticket_price }} PKR</h3>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('attendee.downloadTicket', ['eventId' => $event->id]) }}"
                                    class="btn btn-default btn-lg btn-flat">
                                    <i class="fas fa-cart fa-lg mr-2"></i>
                                   Download Ticket
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
