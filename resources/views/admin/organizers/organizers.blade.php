@extends('MasterLayout.master')
@section('title', 'Registered Organizers')


@section('main-content')
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Registered Event Organizers</h3>
            &nbsp;

            {{-- <a href="{{ route('admin.pendingOrganizersList') }}">
                <span class="badge badge-danger">{{ $pendingOrganizersCount }} Pending Approvles</span>
            </a> --}}
            @if ($pendingOrganizersCount > 0)
                <a href="{{ route('admin.pendingOrganizersList') }}">
                    <span class="badge badge-danger">{{ $pendingOrganizersCount }} Pending Approvals</span>
                </a>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                   <b> {{ session('status') }}</b>
                </div>
            @endif

            {{-- <p>Total Pending Organizers: {{ $pendingOrganizersCount }}</p> --}}


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
                        <th>Company Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organizers as $organizer)
                        <tr>
                            <td>{{ $organizer->id }}</td>
                            <td>
                                {{-- <img src="{{ asset('images/events/' . $event->image) }}" alt="Image" width="70px"
                                    height="70px"> --}}
                            </td>
                            <td>{{ $organizer->name }}</td>
                            <td>{{ $organizer->email }}</td>
                            <td>{{ $organizer->phone }}</td>
                            <td>{{ $organizer->address }}</td>
                            <td>{{ $organizer->company_name }}</td>

                            {{-- <td>{{ $event->organizer->name }}</td> <!-- Accessing the organizer's name --> --}}

                            <td>
                                <!-- Call to action buttons -->
                                <ul class="list-inline m-0">
                                    <a href="#">
                                        <li class="list-inline-item">
                                            <button class="btn btn-primary btn-sm rounded-0" type="button"
                                                data-toggle="tooltip" data-placement="top" title="View Organizer details"><i
                                                    class="fa-sharp fa-solid fa-eye fa-sm"></i></button>
                                        </li>
                                    </a>

                                    <a href="{{ url('admin/delete-organizer', $organizer->id) }}">
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
