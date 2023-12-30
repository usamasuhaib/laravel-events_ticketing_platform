@extends('MasterLayout.master')
@section('title', 'Events')


@section('main-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Events</h3>


            <a href="{{ route('organizer.addEvent') }}"><input type="submit" value="Add new event"
                    class="btn btn-success float-right"></a>
        </div>

        {{-- alert messages --}}
        {{-- @if (session('update'))
            <div class="alert alert-success">
                <b> {{ session('update') }}</b>
            </div>
        @endif
        @if (session('delete-event'))
            <div class="alert alert-success">
                <b> {{ session('delete-event') }}</b>
            </div>
        @endif --}}

        @if (session('status'))
            <div class="callout callout-info">
                <h5><i class="fas fa-info"></i> Alert :</h5>
                <div class="alert alert-success">
                    <b> {{ session('status') }}</b>
                </div>
            </div>
        @endif



        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Event Title</th>
                        <th>Category</th>
                        <th>Capacity</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Ticket Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td>{{ $event->id }}</td>
                            <td>
                                <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px">
                            </td>
                            <td>{{ $event->event_title }}</td>
                            <td>{{ $event->category }}</td>
                            <td>{{ $event->capacity }}</td>
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->event_time }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ $event->ticket_price }} &dollar;</td>
                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">


                                    <a href="{{ route('organizer.eventDetails', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>

                                    <a href="{{ url('organizer/edit-event', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-success btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit"></i></button>
                                        </li>
                                    </a>
                                    {{-- <a href="{{url('edit-std',$student->id)}}" class="btn btn-primary">Edit</a> --}}

                                    <a href="{{ url('organizer/delete-event', $event->id) }}">
                                        <li class="list-inline-item">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></button>
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
