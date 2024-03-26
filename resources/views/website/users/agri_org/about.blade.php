@extends('website.layout.webpage')
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
            {{--  include sidebar  --}}
            @include('website.users.agri_org.loan_provider.include.sidebar')
            <div class="col-md-9 pb-3">
                <div class="aboutcontainer">
                    {{-- Check if $about is not empty --}}
                    @if ($about)
                        <h1>About Details</h1>
                        <p>{{ $about->about }}</p>

                        <h1>Loan Providing Types</h1>
                        <p>{!! $about->type_of_service !!}</p>

                        <h1>Team</h1>
                        <p>{{ $about->team }}</p>

                        <h1>Conditions</h1>
                        <p>{!! $about->conditions !!}</p>

                        <a href="{{ route('org.editabout') }}"><button type="submit">Make update</button></a>
                    @else
                        <p>No about information available.</p>

                        {{-- Button to add new information --}}
                        <a href="{{ route('org.addAbout') }}" class="btn btn-primary">Add Information</a>
                    @endif
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
