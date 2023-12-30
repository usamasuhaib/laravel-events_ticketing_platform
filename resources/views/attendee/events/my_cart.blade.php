@extends('MasterLayout.master')
@section('title', 'Events')


@section('main-content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">My Cart</h3>

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
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        {{-- <th>Image</th> --}}
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Venue</th>
                        <th>Ticket Price</th>
                        {{-- <th>Organizer Name</th> --}}

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($eventsInCart as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            {{-- <td>
                                <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px">
                            </td> --}}
                            <td>{{ $event->event_title }}</td>
                            <td>{{ $event->category }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->venue }}</td>

                            <td>{{ $event->ticket_price }}&nbsp &dollar;</td>
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

                                        <a href="{{ route('attendee.removeFromWishlist', ['eventId' => $event->id]) }}">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Remove From Cart">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </a>

                                        {{-- <a href="{{ route('attendee.buyTicket', ['eventId' => $event->id]) }}"> --}}
                                        <a href="{{ route('attendee.stripe', $event->id) }}">
                                            <button class="btn btn-success btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Confirm your seat">
                                                <i class="fa-solid fa-money-check fa-lg"></i>&nbsp <b>Check Out</b>
                                            </button>
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
