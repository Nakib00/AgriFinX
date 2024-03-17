@extends('website.layout.webpage')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <h4 class="mb-4">Agricultural Officer Dashboard</h4>
            </div>
        </div>
        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.agri_officer.include.sidebar')
            <div class="col-md-9">
                <div class="dashboard-content">
                    @yield('agriofficer.dashboard')
                </div>
            </div>
        </div>
    </div>
@endsection
