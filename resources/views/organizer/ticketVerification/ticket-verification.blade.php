@extends('MasterLayout.master')
@section('title', 'Ticket Verification')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ticket Verification</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Verify Ticket</h4>
                        <p class="card-text">Welcome to the ticket verification portal. You can use this page to verify
                            tickets by entering their ticket IDs.</p>

                        @error('ticket_id')
                            <div class="alert alert-danger">
                               <b>  {{ $message }}</b>
                            </div>
                        @enderror
                        <!-- Ticket Verification Form -->
                        <form action="{{ route('organizer.ticket-verify') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="ticket_id">Enter Ticket ID:</label>
                                <input type="text" class="form-control" id="ticket_id" name="ticket_id"
                                    placeholder="Ticket ID" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
