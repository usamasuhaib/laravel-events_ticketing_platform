@extends('MasterLayout.master')
@section('title', 'Add new Event')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Event</h1>
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
        <div class="card-header">
            <h3 class="card-title">Event Details</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('organizer.storeEvent') }}" enctype="multipart/form-data">
                @csrf
                {{-- row 1 --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="inputName">Event Title</label>
                            <input type="text" id="inputName" name="event_title" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 2 --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="4" oninput="countWords()"></textarea>
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 3 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
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
                            <input type="number" id="inputName" name="capacity" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 4 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Date</label>
                            <input type="date" id="inputName" name="event_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Time</label>
                            <input type="time" id="inputName" name="event_time" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                {{-- row 5 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Event Venue</label>
                            <input type="text" id="inputName" name="venue" class="form-control">
                        </div>
                    </div>
        
                    <div class="col-6">
                        <div class="form-group">
                            <label for="ticket_price">Ticket Price</label>
                            <input type="number" id="ticket_price" name="ticket_price" class="form-control">
                        </div>
                    </div>
                </div>
                {{-- row 6 --}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="inputName">Event Logo</label>
                            <input type="file" id="inputName" name="image" class="form-control">
                            <small>(Optional)</small>
                        </div>
                    </div>
                </div>



                <br>
                {{-- Ticket Type Fields --}}
                {{-- <hr>
                <h4>Ticket Types</h4>
                <div class="ticket-type-fields">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_name_1">Name</label>
                                <input type="text" id="ticket_type_name_1" name="ticket_type_name[1]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_description_1">Description</label>
                                <input type="text" id="ticket_type_description_1" name="ticket_type_description[1]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_price_1">Price</label>
                                <input type="number" id="ticket_type_price_1" name="ticket_type_price[1]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_name_2">Name</label>
                                <input type="text" id="ticket_type_name_2" name="ticket_type_name[2]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_description_2">Description</label>
                                <input type="text" id="ticket_type_description_2" name="ticket_type_description[2]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_price_2">Price</label>
                                <input type="number" id="ticket_type_price_2" name="ticket_type_price[2]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_name_3">Name</label>
                                <input type="text" id="ticket_type_name_3" name="ticket_type_name[3]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_description_3">Description</label>
                                <input type="text" id="ticket_type_description_3" name="ticket_type_description[3]" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="ticket_type_price_3">Price</label>
                                <input type="number" id="ticket_type_price_3" name="ticket_type_price[3]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- End Ticket Type Fields --}}
                
                <div class="row" style="padding-bottom: 10px">
                    <div class="col-12">
                        <input type="submit" value="Create new Event" class="btn btn-success float-right">
                    </div>
                </div>
            </form>
        </div>
        
        

    </div>


@endsection
