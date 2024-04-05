@extends('website.layout.webpage')
@section('content')
    <section class="section-padding" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Insurance Provider Organization Profile</h2>
            </div>

            {{--  <!-- About section -->  --}}
            <div class="profile-section">
                <h2>About</h2>
                @if ($about)
                    <p>{{ $about[0]->about }}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Loan providing types section -->  --}}
            <div class="profile-section">
                <h2>Loan Providing Types</h2>
                @if ($about)
                    <p>{!! $about[0]->type_of_service !!}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Team section -->  --}}
            <div class="profile-section">
                <h2>Team</h2>
                @if ($about)
                    <p>{{ $about[0]->team }}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Conditions section -->  --}}
            <div class="profile-section">
                <h2>Conditions</h2>
                @if ($about)
                    <p>{!! $about[0]->conditions !!}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Contact section -->  --}}
            <div class="profile-section">
                <h2>Contact</h2>
                <p>If you have any questions or inquiries, please feel free to contact us:</p>
                <ul>
                    <li>Email: {{ $organization[0]->email }}</li>
                    <li>Phone: {{ $organization[0]->phone }}</li>
                    <li>Address: {{ $organization[0]->address }}</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
