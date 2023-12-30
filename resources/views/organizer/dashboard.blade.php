@extends('MasterLayout.master')
@section('title', 'Organizer Dashboard')

@section('content-header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Organizer Dashboard</h1>
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
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $eventCount }}</h3>

            <p>My Events</p>
          </div>
          <div class="icon">
            <i class="fas fa-list"></i>
          </div>
          <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalTicketsSold }}</h3>

            <p>Tickets sold</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="{{ route('organizer.revenue.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>2</h3>
            <p>Events in Cart</p>
          </div>
          <div class="icon">
            <i class="fas fa-cart-plus"></i>
          </div>
          <a href="#" class="small-box-footer">
             <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $totalRevenue }} &dollar;</h3>

            <p>Revenue Earned</p>
          </div>
          <div class="icon">
            {{-- <i class="fas fa-chart-pie"></i> --}}
            <i class="fas fa-money-check-dollar"></i>
            {{-- <i class="fa-solid fa-money-check-dollar fa-sm"></i> --}}
          </div>
          <a href="{{ route('organizer.revenue.index') }}" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
