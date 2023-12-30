@extends('MasterLayout.master')
@section('title', 'Events')


@section('main-content')


    @if (session('status'))
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Alert :</h5>
            <div class="alert alert-success">
                <b> {{ session('status') }}</b>
            </div>
        </div>
    @endif

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Events</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Event Organizer</th>
                        <th> Price (&dollar;)</th>
                        {{-- <th>Organizer Name</th> --}}

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>
                                <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px">
                            </td>
                            <td>{{ $event->event_title }}</td>
                            <td>{{ $event->category }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->event_time }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ $event->organizer ? $event->organizer->name : 'N/A' }}</td>
                            <td><b>{{ $event->ticket_price }}&nbsp </b></td>
                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}


                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <a href="{{ route('event.details', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Event details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>
                            
                                    <a href="{{ route('attendee.stripeCheckOut', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-success btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Confirm your seat">
                                                <i class="fa-solid fa-money-check fa-lg"></i></i>&nbsp
                                                <b>Buy</b>
                                            </button>
                                        </li>
                                    </a>

                                </ul>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
