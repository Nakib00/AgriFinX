@extends('website.users.farmer.layout.farmerlayout')
@section('agriofficer.dashboard')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Crop Project Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Project Name:</strong> {{ $cropproject->project_name }}
                        </div>
                        <div class="mb-3">
                            <strong>Description:</strong> {{ $cropproject->description }}
                        </div>
                        <div class="mb-3">
                            <strong>Crop Name:</strong> {{ $crop->name }}
                        </div>
                        <div class="mb-3">
                            <strong>Launch Date:</strong> {{ $cropproject->launch_date }}
                        </div>
                        <div class="mb-3">
                            <strong>End Date:</strong> {{ $cropproject->end_date }}
                        </div>
                        <div class="mb-3">
                            <strong>Farm Size:</strong> {{ $cropproject->farm_size }}
                        </div>
                        <div class="mb-3">
                            <strong>Crop Quality:</strong> {{ $cropproject->corp_quality }} KG
                        </div>
                        <div class="mb-3">
                            <strong>Pesticide Cost:</strong> {{ $cropproject->pesticide_cost }} TK
                        </div>
                        <div class="mb-3">
                            <strong>Labour Cost:</strong> {{ $cropproject->labour_cost }} TK
                        </div>

                        <div class="mb-3">
                            <strong>Total expance:</strong>
                            {{ $cropproject->labour_cost + $cropproject->pesticide_cost }} TK
                        </div>

                        @if (isset($cropproject->sells) && $cropproject->sells !== null)
                            <div class="mb-3">
                                <strong>Total sells:</strong>
                                {{ $cropproject->sells * $cropproject->corp_quality }} TK
                            </div>
                        @endif

                        <div class="mb-3">
                            <strong>Funding Status:</strong> {{ $cropproject->funding_status ? 'Funded' : 'Not Funded' }}
                        </div>
                        <div class="mb-3">
                            <strong>Created At:</strong> {{ $cropproject->created_at }}
                        </div>
                        <div class="mb-3">
                            <strong>Updated At:</strong> {{ $cropproject->updated_at }}
                        </div>


                        {{--  <!-- Sell Amount Button -->  --}}
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#sellAmountModal">
                            Sell Amount
                        </button>

                        {{--  Risk assment  --}}
                        <div class="card-header">
                            <h5 class="card-title">Risk assessment Details</h5>
                        </div>
                        <div class="mb-3">
                            <strong>Message:</strong>
                            @if ($cropStartMonthDay <= $launchMonthDay && $cropEndMonthDay >= $endMonthDay)
                                Start your crop project with confidence - our comprehensive risk assessment guarantees zero
                                risk for your farms success!
                            @else
                                The launch and end dates of the project do not match the cultivation start and end dates of
                                the crop.
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Project Status:</strong>
                            @if ($cropproject->labour_cost + $cropproject->pesticide_cost < $cropproject->sells * $cropproject->corp_quality)
                                Congratulations! This crop project is expected to yield profit.
                            @else
                                Unfortunately, this crop project is not projected to yield profit.
                            @endif
                        </div>


                        {{--  Back button  --}}
                        <a href="{{ route('farmer.cropproject') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--  <!-- Sell Amount Modal -->  --}}
    <div class="modal fade" id="sellAmountModal" tabindex="-1" role="dialog" aria-labelledby="sellAmountModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sellAmountModalLabel">Sell Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('farmer.sell.update', $cropproject->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="sellPrice">1kg Sell Price</label>
                            <input type="text" class="form-control" id="sellPrice" name="sell"
                                placeholder="Enter Sell Price">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
