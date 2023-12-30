@extends('MasterLayout.master')
@section('title', 'Events')


@section('main-content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">My Reserved Tickets</h3>

            @if (session('status'))
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Alert :</h5>
                    <div class="alert alert-success">
                        <b> {{ session('status') }}</b>
                    </div>
                </div>
            @endif

        </div>
        <div class="card-body p-0">
     @if($myTickets->isEmpty())

     <div class="callout callout-info">
        {{-- <h5><i class="fas fa-info"></i> Alert :</h5> --}}
        <div class="alert alert-success">
            <b>You have not purchased any tickets yet.</b>
        </div>
    </div>
        {{-- <p>You have not purchased any tickets yet.</p> --}}
        @else
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Title</th>
                        <th>Ticket ID</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Payment Status</th>
                        {{-- <th>Organizer Name</th> --}}

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myTickets as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            {{-- <td>
                                <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px">
                            </td> --}}
                            {{-- <td>{{ $event->event_title }}</td> --}}
                            <td> {{ $event->event->event_title }}</td>

                            <td>{{ $event->ticket_id }}</td>
                            <td> {{ $event->event->event_date }}</td>
                            <td> {{ $event->event->venue }}</td>
                            <td>{{ $event->status }}</td>

                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}

                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <a href="{{ route('attendee.reserved.eventDetails', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Event details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>
                                        <a href="{{ route('attendee.downloadTicket', ['eventId' => $event->id]) }}">
                                            {{-- <a href="{{ route('downloadTicket', ['eventId' => $event->id]) }}"> --}}
                                            <button class="btn btn-info btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Download Ticket">
                                                <i class="fa-solid fa-download fa-lg"></i>&nbsp <b>Download Ticket</b>
                                            </button>
                                        </a>
                                   

                                </ul>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        </div>
        <!-- /.card-body -->
    </div>

@endsection
