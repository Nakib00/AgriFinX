@extends('website.users.agri_org.insurance_org.deashboad')
@section('scontent.dashboard')
    <div class="container mt-4">
        <div class="row">
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

                        <a href="{{ route('insurance.editabout') }}"><button type="submit">Make update</button></a>
                    @else
                        <p>No about information available.</p>

                        {{-- Button to add new information --}}
                        <a href="{{ route('insurance.addAbout') }}" class="btn btn-primary">Add Information</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
