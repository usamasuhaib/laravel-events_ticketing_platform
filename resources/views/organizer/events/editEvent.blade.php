@extends('MasterLayout.master')
@section('title', 'Add new Event')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Event Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Events</a></li>
                        <li class="breadcrumb-item active">addEvent</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('main-content')
    <div class="card card-primary">
        {{-- <div class="card-header">
            <h3 class="card-title">Update event details</h3>
        </div> --}}
        <div class="card-body">
            <form method="POST" action="{{ route('organizer.updateEvent',$event->id) }} " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- row 1 --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputName">Event Title</label>
                            <input type="text" id="inputName" name="event_title" class="form-control" value="{{$event->event_title}}">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 2 --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            
                            <textarea id="description" name="description" class="form-control" rows="4"  >{{$event->description}}</textarea>
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 3 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" value="{{$event->category}}">
                                <option>Conference</option>
                                <option>Seminar</option>
                                <option>Workshop</option>
                                <option>Exhibition</option>
                                <option>Training Program</option>
                                <option>Concert</option>
                                <option>Festival</option>
                                <option>Social Gathering</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Maximum Attendees</label>
                            <input type="number" id="inputName" name="capacity" class="form-control" value="{{$event->capacity}}">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 4 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input type="date" id="inputName" name="event_date" class="form-control" value="{{$event->event_date}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Time</label>
                            <input type="time" id="inputName" name="event_time" class="form-control" value="{{$event->event_time}}">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 5 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Event Venue</label>
                            <input type="text" id="inputName" name="venue" class="form-control" value="{{$event->venue}}">
                        </div>
                    </div>
        
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ticketPrice">Ticket Price</label>
                            <input type="text" id="ticketPrice" name="ticket_price" class="form-control" value="{{$event->ticket_price}}">
                        </div>
                    </div>
                </div>
                <br>   
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Event Logo</label>
                            <input type="file" id="inputName" name="image" class="form-control">
                            <small>(Optional)</small>
                        </div>
                    </div>
                </div>         
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-12">
                        <input type="submit" value="Save changes" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>

    </div>


@endsection
