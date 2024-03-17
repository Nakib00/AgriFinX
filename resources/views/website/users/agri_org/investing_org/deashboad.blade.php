@extends('website.layout.webpage')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="col-md-9">
            <div class="">
                <h4 class="mb-4">Investing organization Dashboard</h4>
            </div>
        </div>
        <div class="row">
            {{--  include sideber  --}}
            @include('website.users.agri_org.investing_org.include.sidebar')
            <div class="col-md-9">
                <div class="dashboard-content">
                    @yield('scontent.dashboard')
                </div>
            </div>
        </div>
    </div>
@endsection
