@extends('components.layouts.app')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <h4 class="mb-4">Loan provider Dashboard</h4>
            </div>
        </div>
        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.agri_org.loan_provider.include.sidebar')
            <div class="col-md-9">
                <div class="dashboard-content">
                    @yield('scontent.dashboard')
                </div>
            </div>
        </div>
    </div>

    {{--  <!-- Bootstrap CSS -->  --}}
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    {{--  <!-- jQuery -->  --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{--  <!-- Bootstrap JS -->  --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
