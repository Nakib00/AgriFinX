@extends('website.users.agri_org.loan_provider.deashboad')
@section('scontent.dashboard')
    {{--  include alirt  --}}
    @include('website.include.alirt')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9 pb-3">
                <div class="about-container">
                    {{-- Check if $about is not empty --}}
                    @if ($about)
                        <div class="about-section">
                            <h1 class="section-title">About Details</h1>
                            <p class="section-content">{{ $about->about }}</p>
                        </div>

                        <div class="about-section">
                            <h1 class="section-title">Loan Providing Types</h1>
                            <p class="section-content">{!! $about->type_of_service !!}</p>
                        </div>

                        <div class="about-section">
                            <h1 class="section-title">Terms</h1>
                            <p class="section-content">{{ $about->team }}</p>
                        </div>

                        <div class="about-section">
                            <h1 class="section-title">Conditions</h1>
                            <p class="section-content">{!! $about->conditions !!}</p>
                        </div>
                        <a href="{{ route('loanprovider.editabout') }}" class="btn btn-success" wire:navigate>Make Update</a>
                    @else
                        <p class="no-info-message">No about information available.</p>
                        {{-- Button to add new information --}}
                        <a href="{{ route('loanprovider.addAbout') }}" class="btn btn-primary" wire:navigate>Add Information</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
