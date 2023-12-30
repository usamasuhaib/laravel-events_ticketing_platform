@extends('MasterLayout.master')
@section('title', 'Buy Ticket')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buy Ticket</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Ticket details and selection -->
            <div class="row">
                <div class="col-md-8">                 
                    <!-- Ticket summery -->
                    <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Event Summary</h3>
                     </div>
                     <div class="card-body">
                         <!-- Display selected ticket and total price here -->
                         <p><b>Event Category : </b>{{ $event->category }}</p>
                         <p><b>Date : </b>{{ $event->event_date }}</p>
                         <p><b>Time : </b>{{ $event->event_time }}</p>
                         <p><b>Venue : </b>{{ $event->venue }}</p>
                         <p><b>Ticket Price : </b>{{ $event->ticket_price }}</p>
                     </div>

                     {{-- <a  href="{{ route('attetndee.stripe', ['eventId' => $event->id]) }}"> --}}
                     
                     <form action="{{ route('attendee.stripeCartCheckOut', $event->id) }}" method="POST">
                        @csrf

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary"> <b> Proceed to pay PKR {{ $event->ticket_price }}</b> </button>
                     </form>
                  
                 </div>
                </div>
                <!-- Ticket summary -->
                <div class="col-md-4">
                   <!-- Event details -->
                   <div class="card">
                     <div class="card-header">
                         <h3 class="card-title">Event Organier Details</h3>
                     </div>
                     <div class="card-body">
                         <!-- Display event details here -->
                         {{-- <h2>{{ $event->organizer->name }}</h2> --}}
                         <p><b>Organizer Name : </b>{{ $event->organizer->name }}</p>
                         <p><b> Email : </b>{{ $event->organizer->email }}</p>
                         <p><b> Phone : </b>{{ $event->organizer->phone }}</p>
                         <!-- Add more event details as needed -->
                     </div>
                 </div>

                 
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@endsection
