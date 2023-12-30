@extends('MasterLayout.master')
@section('title', 'Organizers | Pending Approvels ')


@section('main-content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Pending Approvels</h3>
            &nbsp;&nbsp; &nbsp;


            <a href="{{ route('admin.pendingOrganizersList') }}">
                {{-- <span class="badge badge-success">Approve All</span> --}}
                {{-- <span class="btn btn-success">Approve All</span> --}}
                <span class="btn btn-primary btn-sm">Approve All</span>
            </a>

        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Profile</th>
                        <th>Namee</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Company Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pending_organizers as $pending_organizer)
                        <tr>
                            <td>{{ $pending_organizer->id }}</td>
                            <td>
                                {{-- <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px"> --}}
                            </td>
                            <td>{{ $pending_organizer->name }}</td>
                            <td>{{ $pending_organizer->email }}</td>
                            <td>{{ $pending_organizer->address }}</td>
                            <td>{{ $pending_organizer->company_name }}</td>

                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}

                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <a href="#">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Organizer Details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>
                                    &nbsp;

                                    @foreach ($pending_organizers as $pending_organizer)
                                    <a href="{{ route('admin.approveOrganizer', ['id' => $pending_organizer->id]) }}">
                                        @endforeach
                                        <li class="list-inline-item">
                                            <button class="btn btn-success btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Approve">
                                                <i class="fa-solid fa-check-double"></i>
                                                </button>
                                        </li>
                                    </a>

                                    &nbsp;
                                    <a href="#">
                                        <li class="list-inline-item">
                                            <button class="btn btn-danger btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Decline"><i
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
