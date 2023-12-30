@extends('MasterLayout.master')
@section('title', 'attendee Profile')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>attendee Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @php
                                $profileImage = Auth::guard('attendee')->user()->profile_image;
                            @endphp
                            @if ($profileImage)
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('storage/attendee-profile-images/' . $profileImage) }}"
                                    alt="User profile picture">
                            @else
                                <!-- Dummy profile image -->
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/dummy-profile/dummy-profile.png') }}"
                                    alt="Dummy profile picture">
                            @endif
                        </div>
                        <h3 class="profile-username text-center">{{ $attendee->name }}</h3>

                        <p class="text-muted text-center">attendee</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right">{{ $attendee->email }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Gender</b> <a class="float-right">{{ $attendee->gender }}</a>
                            </li>
                        </ul>

                        {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#about_me" data-toggle="tab">About Me</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Update Profile</a>
                            </li>
                        </ul>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="about_me">
                                <!-- Post -->

                                <!-- About Me Box -->
                                <div class="card-body">
                                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                                    <p class="text-muted">
                                        {{ $attendee->phone }}
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address
                                    </strong>

                                    <p class="text-muted">
                                        {{ $attendee->address }}

                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-home mr-1"></i> Company Name</strong>

                                    <p class="text-muted">
                                        {{ $attendee->company_name }}
                                    </p>



                                    <hr>

                                </div>
                                <!-- /.card-body -->
                                <!-- /.card -->
                            </div>



                            <div class="tab-pane" id="settings">
                                <form method="POST" action="{{ route('attendee.profile.update') }} "
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- row 1 --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Name</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $attendee->name }}">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <select class="form-control select2bs4" style="width: 100%;" name="gender">
                                                    <option value="" {{ $attendee->gender === null ? 'selected' : '' }}>Select Gender</option>

                                                    <option value="Male" {{ $attendee->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ $attendee->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                                    <option value="Other" {{ $attendee->gender === 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </div>
                                            
                                            <!-- /.form-group -->
                                          </div>
                                    </div>
                                    <br>
                                    {{-- row 2 --}}
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $attendee->email }}">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Phone</label>
                                                <input type="text" id="" name="phone" class="form-control"
                                                    value="{{ $attendee->phone }}">
                                            </div>
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    {{-- row 3 --}}

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Address</label>
                                                <input type="text" id="" name="address" class="form-control"
                                                    value="{{ $attendee->address }}">
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="inputName">Profile Image</label>
                                                <input type="file" id="inputName" name="profile_image"
                                                    class="form-control">
                                                @error('profile_image')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <small>(Optional)</small>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <br>
                                    <div class="row" style="padding-bottom: 10px">
                                        <div class="col-12">
                                            <input type="submit" value="Save changes"
                                                class="btn btn-success float-right" id="updateProfileButton">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->


    </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
@endsection
