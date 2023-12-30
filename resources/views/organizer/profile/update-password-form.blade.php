@extends('MasterLayout.master')
@section('title', 'Password Update')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')

    <div class="card card-info">
        <div class="card-header">

            <h3 class="card-title">Update Password</h3>
            @if ($errors->has('current_password'))
                <div class="alert alert-danger">
                    {{ $errors->first('current_password') }}
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('passwordUpdate.organizer') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">

                <div class="form-group row">
                    <label for="current_password" :value="__('Current Password')" class="col-sm-3 col-form-label">Current
                        Password</label>
                    <div class="col-4">
                        <input id="current_password" name="current_password" type="password" class="form-control" placeholder="Email" autocomplete="off">

                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" :value="__('New Password')" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-4">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password_confirmation" :value="__('Confirm Password')"
                        class="col-sm-3 col-form-label">Confirm New Password</label>
                    <div class="col-4">
                        <input id="password_confirmation" name="password_confirmation" type="password" class="form-control"
                            placeholder="Password">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Update Password</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
@endsection