@extends('MasterLayout.master')
@section('title', 'Events')


@section('main-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Revenue</h3>

        </div>

        @if (session('status'))
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Alert :</h5>
                <div class="alert alert-success">
                    <b>{{ session('status') }}</b>
                </div>
            </div>
        @endif

        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Event Title</th>
                        <th>Capacity</th>
                        <th>Ticket Price</th>
                        <th>Tickets Sold</th> <!-- New column -->
                        <th>Revenue</th> <!-- Add a new column for Revenue -->
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                           
                            <td>{{ $event->event_title }}</td>
                            <td>{{ $event->capacity }}</td>
                            <td>{{ $event->ticket_price }} &dollar;</td>
                            <td>{{ $event->ticketsSold }}</td> <!-- Display tickets sold -->

                            <td>{{ $event->calculateRevenue() }} &dollar;</td> <!-- Calculate and display revenue -->
                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <a href="{{ route('organizer.revenue.show', $event->id) }}">
                                        
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>

                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

@endsection
