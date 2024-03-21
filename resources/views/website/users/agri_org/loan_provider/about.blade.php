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
            {{--  include sideber  --}}
            @include('website.users.agri_org.loan_provider.include.sidebar')
            <div class="col-md-9 pb-3">
                <div class="aboutcontainer">
                    @foreach ($about as $item)
                        <h1>About Details</h1>
                        <p>{{ $item->about }}</p>

                        <h1>Loan Providing Types</h1>
                        <p>{!! $item->type_of_service !!}</p>

                        <h1>Team</h1>
                        <p>{{ $item->team }}</p>

                        <h1>Conditions</h1>
                        <p>{!! $item->conditions !!}</p>
                        <a href="{{ route('org.editabout') }}"><button type="submit">Make update</button></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
