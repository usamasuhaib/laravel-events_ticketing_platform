@extends('master-layout.master')
@section('title', 'Events')


@section('main-content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Search Results</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Logo</th>
                        <th>Event Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Organizer Name</th>
                        <th>Ticket Price</th>
                        {{-- <th>Organizer Name</th> --}}

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
                            <td>{{ $event->event_date }}</td>
                            <td>{{ $event->event_time }}</td>
                            <td>{{ $event->venue }}</td>
                            <td>{{ $event->organizer ? $event->organizer->name : 'N/A' }}</td>
                            <td><b>{{ $event->ticket_price }}&nbsp PKR</b></td>
                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}

                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="View Event details"><i class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                    </li>
                    
                                    <li class="list-inline-item">
                                        <button class="btn btn-success btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Confirm your seat"><i class="fa-solid fa-money-check fa-lg"></i></i>&nbsp <b>Buy Ticket</b></button>
                                    </li>

                                </ul>
                            </td>
                            






                            {{-- <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fa-sharp fa-solid fa-eye fa-sm"></i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
