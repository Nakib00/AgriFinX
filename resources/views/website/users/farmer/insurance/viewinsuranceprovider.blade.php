@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <section class="profile-section" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2 class="profile-heading">Insurance Provider Organization Profile</h2>
            </div>
            {{--  <!-- About section -->  --}}
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


            {{--  <!-- Loan providing types section -->  --}}
            <div class="profile-info">
                <h3 class="info-heading">Insurance Providing Types</h3>
                <div class="info-content">
                    @if ($about)
                        <p>{!! $about->type_of_service !!}</p>
                    @else
                        <p class="no-info">No information available</p>
                    @endif
            </div>
        </div>


            {{--  <!-- Team section -->  --}}
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


            {{--  <!-- Conditions section -->  --}}
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

            {{--  <!-- Contact section -->  --}}
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

            {{--  apply for microloan  --}}
            <a href="#" data-toggle="modal" data-target="#microloanModal">
                <button type="button" class="btn btn-primary btn-lg">Apply Insurance</button>
            </a>
        </div>


        {{--  <!-- Modal -->  --}}
        <div class="modal fade" id="microloanModal" tabindex="-1" role="dialog" aria-labelledby="microloanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="microloanModalLabel">Apply for Insurance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('farmer.applyinsurance', ['id' => $organization->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="reason">Claim Amount</label>
                                <input type="number" class="form-control" id="reason" name="claim_amount"
                                    placeholder="Enter Claim Amount">
                            </div>
                            <div class="form-group">
                                <label for="amount">Crop Amount</label>
                                <input type="number" class="form-control" id="amount" name="crop_amount"
                                    placeholder="Enter Crop Amount">
                            </div>
                            
                                
                          
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
