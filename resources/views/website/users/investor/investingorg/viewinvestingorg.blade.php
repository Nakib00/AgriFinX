@extends('website.users.investor.layout.investorlayout')
@section('agriofficer.dashboard')
    <section class="section-padding" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2 class="profile-heading">Investing Organization Profile</h2>
            </div>
            {{--  <!-- About section -->  --}}
            <div class="profile-info">
                <h3 class="info-heading">About</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{{ $about[0]->about }}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{--  <!-- Loan providing types section -->  --}}
            <div class="profile-info">
                <h3 class="info-heading">Loan Providing Types</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{!! $about[0]->type_of_service !!}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
                </div>
            </div>

            {{-- Team section --}}
            <div class="profile-info">
                <h3 class="info-heading">Terms</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{{ $about[0]->team }}</p>
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
                        <p>{!! $about[0]->conditions !!}</p>
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
                        <li>Email: {{ $organization[0]->email }}</li>
                        <li>Phone: {{ $organization[0]->phone }}</li>
                        <li>Address: {{ $organization[0]->address }}</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('investor.investingorg.show') }}"><button type="button" class="btn btn-secondary"
                        data-dismiss="modal" >Back</button></a>
            </div>

            {{--  Investing button  --}}
            <div class="mb-3">
                <button type="button" class="btn btn-primary btn-lg m-3" data-toggle="modal"
                    data-target="#investModal">Invest</button>
            </div>


            {{--  Investing form  --}}
            <div class="modal fade" id="investModal" tabindex="-1" role="dialog" aria-labelledby="investModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="investModalLabel">Invest in Crop Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('investor.investingorg.invest', ['id' => $organization[0]->id]) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="investing_amount">Investing Amount:</label>
                                    <input type="number" class="form-control" id="investing_amount" name="investing_amount"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="percentage_rate">Percentage Rate:</label>
                                    <input type="number" class="form-control" id="percentage_rate" name="percentage_rate"
                                        required>
                                </div>
                                <button type="submit" class="btn btn-primary">Invest</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
