@extends('MasterLayout.master')
@section('title', 'Registered Attendees')


@section('main-content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Registered Attendees</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Namee</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendees as $attendee)
                        <tr>
                            <td>{{ $attendee->id }}</td>
                            <td>
                                {{-- <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px"> --}}
                            </td>
                            <td>{{ $attendee->name }}</td>
                            <td>{{ $attendee->email }}</td>
                            <td>{{ $attendee->phone }}</td>
                            <td>{{ $attendee->address }}</td>
                          
                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}

                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                   <a href="#">
                                    <li class="list-inline-item">
                                        <button class="btn btn-primary btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="View Organizer details"><i class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                    </li>
                                   </a>
                    
                                   <a href="#">
                                    <li class="list-inline-item">
                                        <button class="btn btn-danger btn-sm rounded-0" type="button"
                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </li>
                                </a>

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
