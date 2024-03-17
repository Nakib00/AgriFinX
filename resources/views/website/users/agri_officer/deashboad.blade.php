@extends('website.layout.webpage')
@section('content')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="sidebar">
                    <h4 class="mb-3">Welcome, {{ Auth::guard('agricultural_officer')->user()->f_name }}</h4>
                    <p>{{ Auth::guard('agricultural_officer')->user()->email }}</p>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">Button 1</a></li>
                        <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">Button 2</a></li>
                        <li class="list-group-item"><a href="{{ route('agri_officer.logout') }}"
                                class="btn btn-danger btn-block">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="dashboard-content">
                    <h1 class="mb-4">Agricultural Officer Dashboard</h1>
                    {{-- Your main content here --}}
                </div>
            </div>
        </div>
    </div>
@endsection
