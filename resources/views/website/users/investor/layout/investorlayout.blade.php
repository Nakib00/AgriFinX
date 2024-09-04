@extends('components.layouts.app')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <a href="{{ route('investor.dashboard') }}">
                    <h4 class="mb-4">Investor Dashboard</h4>
                </a>
            </div>
        </div>
        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.investor.include.sidebar')
            <div class="col-md-9">
                <div class="dashboard-content">
                    {{--  Insert data from sidebar button  --}}
                    @yield('agriofficer.dashboard')
                </div>
            </div>
        </div>
    </div>



    {{--  chart   --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    {{--  <!-- Bootstrap CSS -->  --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    {{--  <!-- jQuery -->  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--  <!-- Bootstrap JS -->  --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
