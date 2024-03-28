@extends('website.layout.webpage')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <a href="{{ route('farmer.dashboard') }}">
                    <h4 class="mb-4">Farmer Dashboard</h4>
                </a>
            </div>
        </div>
        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.farmer.include.sidebar')
            <div class="col-md-9">
                <div class="dashboard-content">
                    @yield('agriofficer.dashboard')
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Bootstrap JS and Chart.js -->  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
