@extends('website.layout.webpage')
@section('content')
    

    <section class="profile-section" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2 class="profile-heading">Microloan Provider Organization Profile</h2>
            </div>
            
            {{-- About section --}}
            <div class="profile-info">
                <h3 class="info-heading">About</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{{ $about->about }}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{-- Loan providing types section --}}
            <div class="profile-info">
                <h3 class="info-heading">Loan Providing Types</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{!! $about->type_of_service !!}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{-- Team section --}}
            <div class="profile-info">
                <h3 class="info-heading">Team</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{{ $about->team }}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{-- Conditions section --}}
            <div class="profile-info">
                <h3 class="info-heading">Conditions</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{!! $about->conditions !!}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{-- Contact section --}}
            <div class="profile-info">
                <h3 class="info-heading">Contact</h3>
                <div class="info-content">
                    <p>If you have any questions or inquiries, please feel free to contact us:</p>
                    <ul class="contact-info">
                        <li>Email: {{ $organization->email }}</li>
                        <li>Phone: {{ $organization->phone }}</li>
                        <li>Address: {{ $organization->address }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection