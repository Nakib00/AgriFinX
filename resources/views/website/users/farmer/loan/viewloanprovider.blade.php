@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <section class="section-padding" id="section_3">
        <div class="container viewprofile">
            <div class="col-lg-12 col-12 text-center mb-4">
                <h2>Microloan Provider Organization Profile</h2>
            </div>
            {{--  <!-- About section -->  --}}
            <div class="profile-section">
                <h2>About</h2>
                @if ($about)
                    <p>{{ $about->about }}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Loan providing types section -->  --}}
            <div class="profile-section">
                <h2>Loan Providing Types</h2>
                @if ($about)
                    <p>{!! $about->type_of_service !!}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Team section -->  --}}
            <div class="profile-section">
                <h2>Team</h2>
                @if ($about)
                    <p>{{ $about->team }}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Conditions section -->  --}}
            <div class="profile-section">
                <h2>Conditions</h2>
                @if ($about)
                    <p>{!! $about->conditions !!}</p>
                @else
                    <p>No information available</p>
                @endif
            </div>

            {{--  <!-- Contact section -->  --}}
            <div class="profile-section">
                <h2>Contact</h2>
                <p>If you have any questions or inquiries, please feel free to contact us:</p>
                <ul>
                    <li>Email: {{ $organization->email }}</li>
                    <li>Phone: {{ $organization->phone }}</li>
                    <li>Address: {{ $organization->address }}</li>
                </ul>
            </div>

            {{--  apply for microloan  --}}
            <a href="#" data-toggle="modal" data-target="#microloanModal">
                <button type="button" class="btn btn-primary btn-lg">Apply Microloan</button>
            </a>
        </div>


        {{--  <!-- Modal -->  --}}
        <div class="modal fade" id="microloanModal" tabindex="-1" role="dialog" aria-labelledby="microloanModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="microloanModalLabel">Apply for Microloan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('farmer.applyloan', ['id' => $organization->id]) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="reason">Reason for Taking Loan</label>
                                <input type="text" class="form-control" id="reason" name="reason"
                                    placeholder="Enter reason">
                            </div>
                            <div class="form-group">
                                <label for="amount">Loan Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount"
                                    placeholder="Enter amount">
                            </div>
                            <div class="form-group">
                                <label for="installment">Installment Period</label>
                                <select class="form-control" id="installment" name="installment">
                                    <option value="monthly">Monthly</option>
                                    <option value="yearly">Yearly</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
