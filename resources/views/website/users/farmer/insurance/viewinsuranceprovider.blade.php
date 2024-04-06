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
                        <p>{{ $about[0]->about }}</p>
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
                        <p>{!! $about[0]->type_of_service !!}</p>
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
                        <p>{{ $about[0]->team }}</p>
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
                        <p>{!! $about[0]->conditions !!}</p>
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
                        <li>Email: {{ $organization[0]->email }}</li>
                        <li>Phone: {{ $organization[0]->phone }}</li>
                        <li>Address: {{ $organization[0]->address }}</li>
                    </ul>
                </div>
            </div>

            {{--  apply for microloan  --}}
            <div class="text-center">
            <a href="#" data-toggle="modal" data-target="#microloanModal">
                <button type="button" class="btn btn-primary btn-lg">Apply Insurance</button>
            </a>
        </div>
           
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
                        <form action="{{ route('farmer.applyinsurance', ['id' => $organization[0]->id]) }}" method="post">
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



                            <button type="submit" class="btn btn-success">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- report croploss
        <div class="modal fade" id="cropLossModal" tabindex="-1" role="dialog" aria-labelledby="cropLossModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cropLossModalLabel">Report Crop Loss</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('farmer.reportcroploss', ['id' => $organization[0]->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="reason">Reason for Crop Loss</label>
                                <input type="text" class="form-control" id="reason" name="disaster_type" placeholder="Enter Disaster Type">
                            </div>
                            <div class="form-group">
                                <label for="amount">Estimated Crop Loss Amount</label>
                                <input type="number" class="form-control" id="amount" name="loss_amount" placeholder="Enter Amount">
                            </div> 
                           <button type="submit" class="btn btn-primary">Report</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
                </div>
            </div>
        </div>
    </div>
            
    </div>  --}}
        
    
    </section>
@endsection
